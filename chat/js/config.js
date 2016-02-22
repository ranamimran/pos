;(function(window) {
    var QBApp = {
        appId: 33838,
        authKey: 'PWQJEMXxPA3R93a',
        authSecret: 't8Mz2wBTQrh3etg'
    };
    var config = {
        chatProtocol: {
            active: 2
        },
        debug: {
            mode: 0,
            file: null
        },
        webrtc: {
            answerTimeInterval: 30,
            dialingTimeInterval: 5,
            disconnectTimeInterval: 30
        }
    };

    var MESSAGES = {
        'login': 'Login as any user on this computer and another user on another computer.',
        'create_session': 'Creating a session...',
        'connect': 'Connecting...',
        'connect_error': 'Something wrong with connect to chat. Check internet connection or user info and trying again.',
        'login_as': 'Logged in as ',
        'title_login': 'Choose a user to login with:',
        'title_callee': 'Choose users to call:',
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

        vars.forEach(function (el, i) {
            var pair = el.split('=');

            if (pair[0] === q) {
                answ = pair[1];
            }
        });

        return answ;
    }
    QB.init(QBApp.appId, QBApp.authKey, QBApp.authSecret, config);

    window.QBApp = QBApp;
    window.CONFIG = config;
    window.MESSAGES = MESSAGES;
}(window));