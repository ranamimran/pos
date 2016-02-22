//"use strict";
  var currentUser;
    
var $j = jQuery.noConflict();

    var id = localStorage.getItem("qb_admin_id");
    var name = localStorage.getItem("qb_login");
    var login = localStorage.getItem("qb_login");
    var pass = localStorage.getItem("qb_password");
    var admin=
         {
            id: id,
            name: 'Admin',
            login: login,
            pass: pass,
            colour:'#efefef'
        };
        
$j(document).ready(function() {
  // User1 login action
  $j('#user1').click(function() {
    currentUser = admin;
    connectToChat(admin);
    $j("#loginForm").modal("show");
    $j('#loginForm .progress').hide();
  });
});

function connectToChat(user) {
  //$j('#loginForm button').hide();
  $j('#loginForm .progress').show();

  // Create session and connect to chat
  //
  QB.createSession({login: user.login, password: user.pass}, function(err, res) {
    if (res) {
      // save session token
      token = res.token;

      user.id = res.user_id;
      mergeUsers([{user: user}]);

      QB.chat.connect({userId: user.id, password: user.pass}, function(err, roster) {
        if (err) {
          console.log(err);
        } else {
          console.log(roster);
          // load chat dialogs
          //
          retrieveChatDialogs();

          // setup message listeners
          //
          setupAllListeners();

          // setup scroll events handler
          //
          setupMsgScrollHandler();
        }
      });
    }
  });
}

function setupAllListeners() {
  QB.chat.onDisconnectedListener    = onDisconnectedListener;
  QB.chat.onReconnectListener       = onReconnectListener;
  QB.chat.onMessageListener         = onMessage;
  QB.chat.onSystemMessageListener   = onSystemMessageListener;
  QB.chat.onDeliveredStatusListener = onDeliveredStatusListener;
  QB.chat.onReadStatusListener      = onReadStatusListener;
  setupIsTypingHandler();
}

// reconnection listeners
function onDisconnectedListener(){
  console.log("onDisconnectedListener");
}

function onReconnectListener(){
  console.log("onReconnectListener");
}


// niceScroll() - ON
$j(document).ready(
    function() {
      $j("html").niceScroll({cursorcolor:"#02B923", cursorwidth:"7", zindex:"99999"});
      $j(".nice-scroll").niceScroll({cursorcolor:"#02B923", cursorwidth:"7", zindex:"99999"});
    }
);
