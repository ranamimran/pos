<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="language" content="en">
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/chat/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/quickblox.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.0/jquery.nicescroll.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.4.3/jquery.timeago.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/config.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/connection.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/messages.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/ui_helpers.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/dialogs.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/chat/js/users.js"></script>
        
        
        
</head>
<body>
<div class="container" id="page">
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                            array('label'=>'Home', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>(Yii::app()->controller == 'site' || Yii::app()->controller->action->id == 'index') ? ('active') : (''))),
                            array('label'=>'Recieved Orders', 'url'=>array('/orders/admin'),'itemOptions'=>array('class'=>(Yii::app()->controller->action->id == 'admin' || Yii::app()->controller->action->id == 'view') ? ('active') : (''))),
                            array('label'=>'Processed Orders', 'url'=>array('/orders/processed'),'itemOptions'=>array('class'=>(Yii::app()->controller->action->id == 'processed') ? ('active') : (''))),
//                            array('label'=>'Reports', 'url'=>array('/orders/reposts')),
//                            array('label'=>'Search', 'url'=>array('/orders/search')),
                            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    ),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<?php echo $content; ?>
	<div class="clear"></div>
	<div id="footer">
            Powered By <a href="#">Conformiz</a>
		<?php //echo Yii::powered(); ?>
	</div><!-- footer -->
</div><!-- page -->
</body>
</html>
