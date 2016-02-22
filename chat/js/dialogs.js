var $j = jQuery.noConflict();
var dialogs = {};

function onSystemMessageListener(message) {
  if (!message.delay) {
    switch (message.extension.notification_type) {
      case "1":
        // This is a notification about dialog creation
        getAndShowNewDialog(message.extension.dialog_id);
        break;
      case "2":
        // This is a notification about dialog update
        getAndUpdateDialog(message.extension.dialog_id);
        break;
      default:
        break;
    }
  }
}

function retrieveChatDialogs() {
  // get the chat dialogs list
  //
  QB.chat.dialog.list(null, function(err, resDialogs) {
    if (err) {
      console.log(err);
    } else {

      // repackage dialogs data and collect all occupants ids
      //
      var occupantsIds = [];

      if(resDialogs.items.length === 0){

        // hide login form
        $j("#loginForm").modal("hide");

        // setup attachments button handler
        //
        $j("#load-img").change(function(){
          var inputFile = $j("input[type=file]")[0].files[0];
          if (inputFile) {
            $j("#progress").show(0);
          }

          clickSendAttachments(inputFile);
        });

        return;
      }

      resDialogs.items.forEach(function(item, i, arr) {
        var dialogId = item._id;
        dialogs[dialogId] = item;

        // join room
        if (item.type != 3) {
          QB.chat.muc.join(item.xmpp_room_jid, function() {
             console.log("Joined dialog "+dialogId);
          });
        }

        item.occupants_ids.map(function(userId) {
          occupantsIds.push(userId);
        });
      });

      // load dialogs' users
      //
      updateDialogsUsersStorage(jQuery.unique(occupantsIds), function(){
        // show dialogs
        //
        resDialogs.items.forEach(function(item, i, arr) {
          showOrUpdateDialogInUI(item, false);
        });

        //  and trigger the 1st dialog
        //
        triggerDialog(resDialogs.items[0]._id);

        // hide login form
        $j("#loginForm").modal("hide");

        // setup attachments button handler
        //
        $j("#load-img").change(function(){
          var inputFile = $j("input[type=file]")[0].files[0];
          if (inputFile) {
            $j("#progress").show(0);
          }

          clickSendAttachments(inputFile);
        });
      });
    }
  });
}

function showOrUpdateDialogInUI(itemRes, updateHtml) {
  var dialogId = itemRes._id;
  var dialogName = itemRes.name;
  var dialogType = itemRes.type;
  var dialogLastMessage = itemRes.last_message;
  var dialogUnreadMessagesCount = itemRes.unread_messages_count;
  var dialogIcon = getDialogIcon(itemRes.type);

  if (dialogType == 3) {
    opponentId    = QB.chat.helpers.getRecipientId(itemRes.occupants_ids, currentUser.id);
    opponentLogin = getUserLoginById(opponentId);
    dialogName    = 'Dialog with ' + opponentLogin;
  }

  if (updateHtml === true) {
  	var updatedDialogHtml = buildDialogHtml(dialogId, dialogUnreadMessagesCount, dialogIcon, dialogName, dialogLastMessage);
    $j('#dialogs-list').prepend(updatedDialogHtml);
    $j('.list-group-item.active .badge').text(0).hide(0);
	} else {
    var dialogHtml = buildDialogHtml(dialogId, dialogUnreadMessagesCount, dialogIcon, dialogName, dialogLastMessage);
    $j('#dialogs-list').append(dialogHtml);
	}
}

// add photo to dialogs
function getDialogIcon (dialogType) {
  var groupPhoto = '<img src="../../../chat/images/ava-group.svg" width="30" height="30" class="round">';
  var privatPhoto  = '<img src="../../../chat/images/ava-single.svg" width="30" height="30" class="round">';
  var defaultPhoto = '<span class="glyphicon glyphicon-eye-close"></span>';

  var dialogIcon;
  switch (dialogType) {
    case 1:
      dialogIcon = groupPhoto;
      break;
    case 2:
      dialogIcon = groupPhoto;
      break;
    case 3:
    	dialogIcon = privatPhoto;
      break;
    default:
      dialogIcon = defaultPhoto;
      break;
  }
  return dialogIcon;
}

// show unread message count and new last message
function updateDialogsList(dialogId, text){

  // update unread message count
  var badgeCount = $j('#'+dialogId+' .badge').html();
  $j('#'+dialogId+'.list-group-item.inactive .badge').text(parseInt(badgeCount)+1).fadeIn(500);

  // update last message
  $j('#'+dialogId+' .list-group-item-text').text(text);
}

// Choose dialog
function triggerDialog(dialogId){
  console.log("Select a dialog with id: " + dialogId + ", name: " + dialogs[dialogId].name);

  // deselect
  var kids = $j('#dialogs-list').children();
  kids.removeClass('active').addClass('inactive');

  // select
  $j('#'+dialogId).removeClass('inactive').addClass('active');

  $j('.list-group-item.active .badge').text(0).delay(250).fadeOut(500);

  $j('#messages-list').html('');

  // load chat history
  //
  retrieveChatMessages(dialogs[dialogId], null);

  $j('#messages-list').scrollTop($j('#messages-list').prop('scrollHeight'));
}

function setupUsersScrollHandler(){
  // uploading users scroll event
  $j('.list-group.pre-scrollable.for-scroll').scroll(function() {
    if  ($j('.list-group.pre-scrollable.for-scroll').scrollTop() == $j('#users_list').height() - $j('.list-group.pre-scrollable.for-scroll').height()){

      // get and show users
      retrieveUsersForDialogCreation(function(users) {
        $j.each(users, function(index, item){
          showUsers(this.user.login, this.user.id);
        });
      });
    }
  });
}

//
function showUsers(userLogin, userId) {
  var userHtml = buildUserHtml(userLogin, userId, false);
  $j('#users_list').append(userHtml);
}

// show modal window with users
function showNewDialogPopup() {
  $j("#add_new_dialog").modal("show");
  $j('#add_new_dialog .progress').hide();

  // get and show users
  retrieveUsersForDialogCreation(function(users) {
    if(users === null || users.length === 0){
      return;
    }
    $j.each(users, function(index, item){
      showUsers(this.user.login, this.user.id);
    });
  });

  setupUsersScrollHandler();
}

// select users from users list
function clickToAdd(forFocus) {
  if ($j('#'+forFocus).hasClass("active")) {
    $j('#'+forFocus).removeClass("active");
  } else {
    $j('#'+forFocus).addClass("active");
  }
}

// create new dialog
function createNewDialog() {
  var usersIds = [];
  var usersNames = [];

  $j('#users_list .users_form.active').each(function(index) {
    usersIds[index] = $j(this).attr('id');
    usersNames[index] = $j(this).text();
  });

  $j("#add_new_dialog").modal("hide");
  $j('#add_new_dialog .progress').show();

  var dialogName;
  var dialogOccupants;
  var dialogType;

  if (usersIds.length > 1) {
    if (usersNames.indexOf(currentUser.login) > -1) {
      dialogName = usersNames.join(', ');
    }else{
      dialogName = currentUser.login + ', ' + usersNames.join(', ');
    }
    dialogOccupants = usersIds;
    dialogType = 2;
  } else {
    dialogOccupants = usersIds;
    dialogType = 3;
  }

  var params = {
    type: dialogType,
    occupants_ids: dialogOccupants,
    name: dialogName
  };

  // create a dialog
  //
  console.log("Creating a dialog with params: " + JSON.stringify(params));

  QB.chat.dialog.create(params, function(err, createdDialog) {
    if (err) {
      console.log(err);
    } else {
      console.log("Dialog " + createdDialog._id + " created with users: " + dialogOccupants);

      // save dialog to local storage
      var dialogId = createdDialog._id;
      dialogs[dialogId] = createdDialog;

      currentDialog = createdDialog;

      joinToNewDialogAndShow(createdDialog);

      notifyOccupants(createdDialog.occupants_ids, createdDialog._id, 1);

      triggerDialog(createdDialog._id);

      $('a.users_form').removeClass('active');
    }
  });
}

//
function joinToNewDialogAndShow(itemDialog) {
  var dialogId = itemDialog._id;
  var dialogName = itemDialog.name;
  var dialogLastMessage = itemDialog.last_message;
  var dialogUnreadMessagesCount = itemDialog.unread_messages_count;
  var dialogIcon = getDialogIcon(itemDialog.type);

  // join if it's a group dialog
  if (itemDialog.type != 3) {
    QB.chat.muc.join(itemDialog.xmpp_room_jid, function() {
       console.log("Joined dialog: " + dialogId);
    });
    opponentLogin = null;
  } else {
    opponentId = QB.chat.helpers.getRecipientId(itemDialog.occupants_ids, currentUser.id);
    opponentLogin = getUserLoginById(opponentId);
    dialogName = chatName = 'Dialog with ' + opponentLogin;
  }

  // show it
  var dialogHtml = buildDialogHtml(dialogId, dialogUnreadMessagesCount, dialogIcon, dialogName, dialogLastMessage);
  $j('#dialogs-list').prepend(dialogHtml);
}

//
function notifyOccupants(dialogOccupants, dialogId, notificationType) {
  dialogOccupants.forEach(function(itemOccupanId, i, arr) {
    if (itemOccupanId != currentUser.id) {
      var msg = {
        type: 'chat',
        extension: {
          notification_type: notificationType,
          dialog_id: dialogId
        }
      };

      QB.chat.sendSystemMessage(itemOccupanId, msg);
    }
  });
}

//
function getAndShowNewDialog(newDialogId) {
  // get the dialog and users
  //
  QB.chat.dialog.list({_id: newDialogId}, function(err, res) {
    if (err) {
      console.log(err);
    } else {

      var newDialog = res.items[0];

      // save dialog to local storage
      var dialogId = newDialog._id;
      dialogs[dialogId] = newDialog;

      // collect the occupants
      var occupantsIds = [];
      newDialog.occupants_ids.map(function(userId) {
        occupantsIds.push(userId);
      });
      updateDialogsUsersStorage(jQuery.unique(occupantsIds), function(){

      });

      joinToNewDialogAndShow(newDialog);
    }
  });
}

function getAndUpdateDialog(updatedDialogId) {
  // get the dialog and users
  //

  var dialogAlreadyExist = dialogs[updatedDialogId] !== null;
  console.log("dialog " + updatedDialogId + " already exist: " + dialogAlreadyExist);

  QB.chat.dialog.list({_id: updatedDialogId}, function(err, res) {
    if (err) {
      console.log(err);
    } else {

      var updatedDialog = res.items[0];

      // update dialog in local storage
      var dialogId = updatedDialog._id;
      dialogs[dialogId] = updatedDialog;

      // collect the occupants
      var occupantsIds = [];
      updatedDialog.occupants_ids.map(function(userId) {
        occupantsIds.push(userId);
      });
      updateDialogsUsersStorage(jQuery.unique(occupantsIds), function(){

      });

      if(!dialogAlreadyExist){
          joinToNewDialogAndShow(updatedDialog);
      }else{
        // just update UI
        $j('#'+dialogId+' h4 span').html('');
        $j('#'+dialogId+' h4 span').append(updatedDialog.name);
      }
    }
  });
}

// show modal window with dialog's info
function showDialogInfoPopup() {
  $j("#update_dialog").modal("show");
  $j('#update_dialog .progress').hide();

  // shwo current dialog's occupants
  setupDialogInfoPopup(currentDialog.occupants_ids, currentDialog.name);
}

// show information about the occupants for current dialog
function setupDialogInfoPopup(occupantsIds, name) {

  // show name
  $j('#dialog-name-input').val(name);

  // show occupants
  var logins = [];
  occupantsIds.forEach(function(item, index) {
    login = getUserLoginById(item);
    logins[index] = login;
  });
  $j('#all_occupants').text('');
  $j('#all_occupants').append('<b>Occupants: </b>'+logins.join(', '));

  // show type
  //
  // private
  if (currentDialog.type == 3) {
    $j('.dialog-type-info').text('').append('<b>Dialog type: </b>privat chat');
    $j('.new-info').hide();
    $j('.push').hide();
    $j('#push_usersList').hide();
    $j('#update_dialog_button').hide();

  // group
  } else {
    $j('.dialog-type-info').text('').append('<b>Dialog type: </b>group chat');
    $j('.new-info').show();
    $j('.push').show();
    $j('#push_usersList').show();
    $j('#update_dialog_button').show();

    // get users to add to dialog
    retrieveUsersForDialogUpdate(function(users){
      if(users === null || users.length === 0){
        return;
      }

      $j.each(users, function(index, item){
        var userHtml = buildUserHtml(this.user.login, this.user.id, true);
        $j('#add_new_occupant').append(userHtml);
      });
    });
    setupScrollHandlerForNewOccupants();
  }
}


function setupScrollHandlerForNewOccupants() {
  // uploading users scroll event
  $j('#push_usersList').scroll(function() {
    if  ($j('#push_usersList').scrollTop() == $j('#add_new_occupant').height() - $j('#push_usersList').height()){

      retrieveUsersForDialogUpdate(function(users){
        if(users === null || users.length === 0){
          return;
        }
        $j.each(users, function(index, item){
          var userHtml = buildUserHtml(this.user.login, this.user.id, false);
          $j('#add_new_occupant').append(userHtml);
        });
      });

    }
  });
}

// for dialog update
function onDialogUpdate() {
  var pushOccupants  = [];
  $j('#add_new_occupant .users_form.active').each(function(index) {
    pushOccupants[index] = $j(this).attr('id').slice(0, -4);
  });

  var dialogName  = $j('#dialog-name-input').val().trim();

  var toUpdate = {
      name:     dialogName,
      push_all: {occupants_ids: pushOccupants}
    };

  console.log("Updating the dialog with params: " + JSON.stringify(toUpdate));

  QB.chat.dialog.update(currentDialog._id, toUpdate, function(err, res) {
    if (err) {
      console.log(err);
    } else {
      console.log("Dialog updated");

      var dialogId = res._id;
      dialogs[dialogId] = res;

      currentDialog = res;

      $j('#'+res._id).remove();

      showOrUpdateDialogInUI(res, true);

      notifyOccupants(res.occupants_ids, dialogId, 2);

      $j('#'+res._id).removeClass('inactive').addClass('active');
    }
  });

  $j("#update_dialog").modal("hide");
  $j('#dialog-name-input').val('');
  $j('.users_form').removeClass("active");
}

// delete currend dialog
function onDialogDelete() {
  if (confirm("Are you sure you want remove the dialog?")) {
    QB.chat.dialog.delete(currentDialog._id, function(err, res) {
      if (err) {
        console.log(err);
      } else {
        console.log("Dialog removed");
        $('#'+currentDialog._id).remove();

        // remove from storage
        delete dialogs[currentDialog._id];

        //  and trigger the next dialog
        if(Object.keys(dialogs).length > 0){
          triggerDialog(dialogs[Object.keys(dialogs)[0]]._id);
        }

      }
    });

    $("#update_dialog").modal("hide");
    $('#update_dialog .progress').show();
  }
}
