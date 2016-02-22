<!-- Modal (login to chat)-->
<div id="loginForm" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Main block -->
            <div class="container">
                <div id="main_block">

                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="list-header">
                                        <h4 class="list-header-title">History</h4>
                                    </div>
                                    <div class="list-group pre-scrollable nice-scroll" id="dialogs-list">
                                        <!-- list of chat dialogs will be here -->
                                    </div>
                                </div>
                                <div id="mcs_container" class="col-md-8 nice-scroll">
                                    <div class="customScrollBox">
                                        <div class="container del-style">
                                            <div class="content list-group pre-scrollable nice-scroll" id="messages-list">
                                                <!-- list of chat messages will be here -->
                                            </div>
                                        </div>
                                    </div>
                                    <div><img src="<?php echo Yii::app()->request->baseUrl; ?>/chat/images/ajax-loader.gif" class="load-msg"></div>
                                    <form class="form-inline" role="form" method="POST" action="" onsubmit="return submit_handler(this)">
                                        <div class="form-group">
                                            <input id="load-img" type="file">
                                            <button type="button" id="attach_btn" class="btn btn-default" onclick="">Attach</button>
                                            <input type="text" class="form-control" id="message_text" placeholder="Enter message">
                                            <button  type="submit" id="send_btn" class="btn btn-default" onclick="clickSendMessage()">Send</button>
                                        </div>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/chat/images/ajax-loader.gif" id="progress">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal (new dialog)-->



<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.0/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.4.1/jquery.timeago.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/quickblox.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/config.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/connection.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/messages.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/ui_helpers.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/dialogs.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/users.js"></script>