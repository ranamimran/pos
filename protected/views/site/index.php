<?php
if(Yii::app()->user->isGuest)
{
    $this->redirect('site/login/');
}
//
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<input type=button class="btn btn-primary" id="btnuser" onClick=window.open("<?php echo Yii::app()->request->baseUrl; ?>/videocall/index.html","demo","width=550,height=300,left=150,top=200,toolbar=0,status=0,location=no,"); value="Conference Call">
<br>
<br>
<!--<img src="<?php // echo Yii::app()->request->baseUrl; ?>/images/pharmacy-4.jpg" width="100%" height="300">-->
<script type="text/javascript">
    
    if (typeof(Storage) !== "undefined") {
        // Store
        localStorage.setItem("user_id","");
        localStorage.setItem("qb_login","0");
        localStorage.setItem("qb_admin_id","0");
        localStorage.setItem("qb_password","0");
        localStorage.setItem("qb_login", "<?php echo Yii::app()->session["adminSession"]["login"]; ?>");
        localStorage.setItem("qb_admin_id", "<?php echo Yii::app()->session["adminSession"]["admin_id"]; ?>");
        localStorage.setItem("qb_password", "<?php echo Yii::app()->session["adminSession"]["password"]; ?>");
        
    } else {
        alert("Sorry, your browser does not support Web Storage...");
    }
</script>   