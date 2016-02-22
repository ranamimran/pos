var QBUsers;
;(function(window) {
  /**
   * Add parameter to url search
   * for switch users groups
   *
   * Possible options:
   * https://examples.com?users=prod
   * https://examples.com?users=dev 
   * https://examples.com - for qa by default
   */
  $j =jQuery.noConflict();
  var usersQuery = _getQueryVar('users');

  var CONFIG = {
    debug: true,
    webrtc: {
      answerTimeInterval: 15,
      dialingTimeInterval: 10,
      disconnectTimeInterval: 10
    }
  };
  var QBApp = {
    appId: 33838,
    authKey: 'PWQJEMXxPA3R93a',
    authSecret: 't8Mz2wBTQrh3etg'
  };
  
  QB.init(QBApp.appId, QBApp.authKey, QBApp.authSecret, CONFIG,true);
  var MESSAGES = {
    'login': 'Login as any user on this computer and another user on another computer.',
    'create_session': 'Creating a session...',
    'connect': 'Connecting...',
    'connect_error': 'Something wrong with connect to chat. Check internet connection or user info and trying again.',
    'login_as': 'Logged in as ',
    'title_login': 'Choose a user to login with:',
    'title_callee': 'Select user to call:',
    'calling': 'Calling...',
    'webrtc_not_avaible': 'WebRTC is not available in your browser',
    'no_internet': 'Please check your Internet connection and try again'
  };

  /**
   * PRIVATE
   */
  /**
   * [_getQueryVar get value of key from search string of url]
   * @param  {[string]} q [name of query]
   * @return {[string]}   [value of query]
   */
  function _getQueryVar(q) {
    var query = window.location.search.substring(1),
        vars = query.split("&"),
        answ = false;

    vars.forEach(function(el, i){
      var pair = el.split('=');

      if(pair[0] === q) {
        answ = pair[1];
      }
    });

    return answ;
  }

  /**
   * set configuration variables in global
   */
  window.QBApp = QBApp;
  window.CONFIG = CONFIG;
  window.MESSAGES = MESSAGES;
}(window));
