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

		    <form action="../../index2.html" method="post">
		      <div class="form-group has-feedback">
		       	<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username'])->label(false) ?>
		        <span class="glyphicon glyphicon-user form-control-feedback"></span>
		      </div>
		      <div class="form-group has-feedback">
		        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		      </div>
		      <div class="row">
		        <div class="col-xs-4">

		        </div>
		        <!-- /.col -->
		        <div class="col-xs-12">
		          <button type="submit" class="btn btn-success btn-block ">Masuk</button>
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
