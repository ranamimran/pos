<style>

	.button{
		width:100%;
		background:#3399cc;
		display:block;
		margin:0 auto;
		margin-top:3%;
		padding:10px;
		text-align:center;
		text-decoration:none;
		color:#fff;
		cursor:pointer;
		transition:background .3s;
		-webkit-transition:background .3s;
                
	}

	.button:hover{
		background:#2288bb;
	}

	#login{
		width:400px;
		margin:2 auto;
		margin-top:8px;
		margin-bottom:2%;
		transition:opacity 1s;
		-webkit-transition:opacity 1s;
	}

	
	#login h1{
		background:#3399cc;
		padding:20px 0;
		font-size:140%;
		font-weight:300;
		text-align:center;
		color:#fff;
	}

	form{
		background:#f0f0f0;
		padding:6% 4%;
	}

	input[type="text"],input[type="password"]{
		width:92%;
		background:#fff;
		margin-top:1%;
		border:1px solid #ccc;
		padding:4%;
		font-family:'Open Sans',sans-serif;
		font-size:95%;
		color:#555;
	}

	input[type="submit"]{
		width:50%;
		background:#3399cc;
		border:0;
		padding:4%;
		font-family:'Open Sans',sans-serif;
		font-size:100%;
		color:#fff;
		cursor:pointer;
		transition:background .3s;
		-webkit-transition:background .3s;
	}

	input[type="submit"]:hover{
		background:#2288bb;
	}
</style>
<div>	
    <div id="login">
        <h1>Prescription Ordering System(Admin)</h1>
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                ),
        )); ?>
        

        <?php echo $form->textField($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>

        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
        <br/>
        <?php echo $form->checkBox($model,'rememberMe'); ?>
        <?php echo $form->label($model,'rememberMe'); ?>
        <?php echo $form->error($model,'rememberMe'); ?>
        <br/>
        <?php echo CHtml::submitButton('Login',array('class'=>'button', 'id'=>'')); ?>
        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->
