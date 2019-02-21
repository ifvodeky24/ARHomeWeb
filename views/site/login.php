<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

	<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
			<div class="login-box-body">
				<div class="login-logo">
 		 		<a href="#"><b>AR</b>Home</a>
 		 		</div>

				<div class="text-center">
							 <h4 class="text-uppercase font-bold m-b-0">Login</h4>
							 <br>
							 <br>
					 </div>

		    <form action="../../index2.html" method="post">
		      <div class="form-group has-feedback">
		       	<?= $form
								->field($model, 'username')
								->textInput(['placeholder' => $model->getAttributeLabel('username')])
								->label(false) ?>
		        <span class="glyphicon glyphicon-user form-control-feedback"></span>
		      </div>
		      <div class="form-group has-feedback">
		        <?= $form
						->field($model, 'password')
						->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
						->label(false) ?>

		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		      </div>
		      <div class="row">
		        <div class="col-xs-4">

		        </div>
		        <!-- /.col -->
		        <div class="col-xs-12">
							<?= Html::submitButton('Masuk', ['class'=>['btn btn-primary btn-bordred col-xs-12'], 'name' => 'login']) ?>
		        </div>
		        <!-- /.col -->
		      </div>
		    </form>

				<div class="logo text-center">
					<br>
		      	<p> &copy;AR-Home by IDW PROJECT <br> <?=date('Y') ?></p>

		    </div>

		  </div>
	<?php ActiveForm::end(); ?>


</div>
