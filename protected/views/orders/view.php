<?php
/* @var $this OrdersController */
/* @var $data Orders */
?>
<?php /* @var $this Controller */ ?>

<script type="text/javascript">
//	stepcarousel.setup({
//		galleryid: 'mygallery', //id of carousel DIV
//		beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
//		panelclass: 'panel', //class of panel DIVs each holding content
//		autostep: {enable:false, moveby:1, pause:3000},
//		panelbehavior: {speed:500, wraparound:true, wrapbehavior:'slide', persist:true},
//		defaultbuttons: {enable: true, moveby: 1, leftnav: ['arrowl.gif', -5, 80], rightnav: ['arrowr.gif', -20, 80]},
//		statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
//		contenttype: ['inline'] //content setting ['inline'] or ['ajax', 'path_to_external_file']
//	})
</script>
<input id="baseurl" type="hidden" value="<?php echo Yii::app()->request->baseUrl; ?>"/>
<div class="span-24">
	<div class="span-12">
		<div>
                    
			<h1>Customer Details</h1>
			<?php 
                        $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'attributes'=>array(
                                    array(
                                        'name'=>'fullName',
                                        'value'=>$model->user->first_name . " " . $model->user->last_name,
                                        ),
                                    array(
                                        'name'=>'Date Of Birth',
                                        'value'=>Yii::app()->dateFormatter->format("d MMM y",'user.date_of_birth')
                                        ),
					'user.phi_number',
					'user.shi_provider',
					'user.shi_number',
					'user.delivery_address',
					'user.address_2',
					'user.city',
					'user.province',
					'user.postal_code',
					'user.billing_address_1',
					'user.preferred_time',
					'user.packagining',
					'user.special_instruction',
				),
			)); ?>
		</div><!-- content -->
	</div>
	<div class="span-12 last">
		<div>
			<h3>Rx Info. For Customer</h3>
		</div>
		<div class="clear"></div>
		<?php
		$images = $model->orderImages;
		if($images)
		{
		?>
		<div>
<!--                    <p style="float: inherit">
                            <b><span id="statusA"></span> out of <span id="statusC"></span> images</b>
                    </p>-->
                    
                    
                            <div class="docs-galley">
                              <ul class="docs-pictures clearfix">
                                   <?php
                                    $images = $model->orderImages;
                                    foreach($images as $image)
                                    {
                                    ?>
                                  <li><img data-original="<?php echo Yii::app()->request->baseUrl.'/images/'.$image->image_name ?>" src="<?php echo Yii::app()->request->baseUrl.'/images/'.$image->image_name ?>" height="150" width="150"></li>
                              <?php } ?>
                              </ul>
                            </div>

                    
		</div>

		<?php }else
		{ echo "NO Image Found"; ?>
                <div class="clear"></div>
			<img src="http://placehold.it/350x300">
		<?php }?>
	</div>
</div>
<div class="clear"></div>
<div style="margin-top: 20px">
<div class="span-24">
<!--	--><?php //echo CHtml::link('Link Text',array('orders/admin')); ?>
	<?php // echo CHtml::button('Cancel', array('submit' => array('orders/admin'),'class'=>"btn")); ?>
<!--	--><?php //echo CHtml::button('Initiate Secure Chat', array('submit' => array('orders/Chat'))); ?>
<!--	<button type="button" value="Blox" id="user1" class="">Initiate Secure Chat</button>-->
	<button type="button" id="user1" class="btn" data-toggle="modal" data-target=".bs-example-modal-lg">Secure Chat</button>
<!--	<input type="button" value="Initiate Secure Chat" onclick="showNewDialogPopup()" />-->
<!--	<input type="button" class="btn" value="Conference Call" />-->
        <input type=button class="btn" id="btnuser" onClick=window.open("<?php echo Yii::app()->request->baseUrl; ?>/videocall/index.html","demo","width=550,height=300,left=150,top=200,toolbar=0,status=0,location=no,"); value="Conference Call">
	<!--<input type="button" class="btn" value="Medication Review Appointment" />-->
	<?php
	echo CHtml::ajaxSubmitButton('Processed Successfully',Yii::app()->createUrl('/orders/ProcessedSuccessfully'),
		array(
			'type'=>'POST',
			'data'=> 'js:{"order_id": '.$model->order_id.'}',
			'success'=>'js:function(data){ alert("Processed successfully !"); }'
		),array('class'=>"btn"));
	?>
	<!--<input type="button" class="btn" value="Rx Instruction Updated" />-->
</div>
</div>


<div style="padding-top: 20px; padding-left: 20px;" id="loginform" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="padding: 10px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            
			<div class="modal-header">
                                <ul class="nav navbar-nav">
                                  <li class="active"><a href="#">Chat</a></li>
                                  <li><a href="#" onclick="showNewDialogPopup()">Create dialog</a></li>
                                  <li><a href="#" onclick="showDialogInfoPopup()">Dialog info</a></li>
                                </ul>
                            <h4 class="modal-title" id="myModalLabel">POS CHAT</h4>
			</div>

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
                                                <div class="del-style">
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

<!-- Modal (new dialog)-->
 <div id="add_new_dialog" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Choose users to create a dialog with</h3>
          </div>
          <div class="modal-body">
            <div class="list-group pre-scrollable for-scroll">
              <div id="users_list" class="clearfix"></div>
            </div>
            <div class="img-place"><img src="<?php echo Yii::app()->request->baseUrl; ?>/chat/images/ajax-loader.gif" id="load-users"></div>
              <input type="text" class="form-control" id="dlg_name" placeholder="Enter dialog name">
            <button id="add-dialog" type="button" value="Confirm" id="" class="btn btn-success btn-lg btn-block" onclick="createNewDialog()">Create dialog</button>
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal (update dialog)-->
    <div id="update_dialog" class="modal fade row" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Dialog info</h3>
          </div>
          <div class="modal-body">
            <div class="col-md-12 col-sm-12 col-xs-12 new-info">
              <h5 class="col-md-12 col-sm-12 col-xs-12">Name:</h5>
              <input type="text" class="form-control" id="dialog-name-input">
            </div>
            <h5 class="col-md-12 col-sm-12 col-xs-12 push">Add more user (select to add):</h5>
            <div class="list-group pre-scrollable occupants" id="push_usersList">
              <div id="add_new_occupant" class="clearfix"></div>
            </div>
            <h5 class="col-md-12 col-sm-12 col-xs-12 dialog-type-info"></h5>
            <h5 class="col-md-12 col-sm-12 col-xs-12" id="all_occupants"></h5>
            <button id="update_dialog_button" type="button" value="Confirm" id="" class="btn btn-success btn-ms btn-block"
              onclick="onDialogUpdate()">Update</button>
            <button id="delete_dialog_button" type="button" value="Confirm" id="for_width" class="btn btn-danger btn-ms btn-block"
              onclick="onDialogDelete()">Delete dialog</button>
          </div>
        </div>
      </div>
    </div>
            <?php 
                $user =  User::model()->findByPk($model['user_id']);
                $user_qb_id='0';
                if($user)
                {
                    if($user->parent_id == '0')
                    {
                        $user_qb_id = $user->qb_id;
                    }else
                    {
                        $user_p =  User::model()->findByPk($user->parent_id);
                        if($user_p)
                            $user_qb_id = $user_p->qb_id;
                    }
                }
                
            ?>
    <script>
    localStorage.setItem("user_id", "<?php echo $user_qb_id;?>");
    </script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/viewer.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/main.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/viewer.js"></script>
<style>
    ul {
  list-style-type: none;
}

li img {
  float: left;
  margin: 10px;
  border: 5px solid #fff;

  -webkit-transition: box-shadow 0.5s ease;
  -moz-transition: box-shadow 0.5s ease;
  -o-transition: box-shadow 0.5s ease;
  -ms-transition: box-shadow 0.5s ease;
  transition: box-shadow 0.5s ease;
}

li img:hover {
  -webkit-box-shadow: 0px 0px 7px rgba(255,255,255,0.9);
  box-shadow: 0px 0px 7px rgba(255,255,255,0.9);
}
</style>

<!--<script type="text/javascript" src="<?php //echo Yii::app()->request->baseUrl; ?>/css/stepcarousel.js"></script>-->
<!--<link type="css" src="<?php //echo Yii::app()->request->baseUrl; ?>/css/viewer.min.css"></script>-->
<script>
    var $j = jQuery.noConflict();
    $j(document).ready(function(){
        
//       $j.timeago();
    });
</script>