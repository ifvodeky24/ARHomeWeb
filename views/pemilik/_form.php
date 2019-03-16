<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pemilik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <?php $form = ActiveForm::begin(); ?>
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <center><h3 class="box-title">Form Pemilik</h3><center>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form">
        <div class="box-body">
          <div class="form-group">

            <center>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Username Anda','class'=>'form-control']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'placeholder'=>'Masukkan Password Anda','class'=>'form-control']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Email Anda','class'=>'form-control']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
            <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Nama Lengkap Anda','class'=>'form-control']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <?= $form->field($model, 'no_kk')->passwordInput(['maxlength' => true,'placeholder'=>'Masukkan Nomor KK Anda','class'=>'form-control']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-map"></i></span>
            <?= $form->field($model, 'alamat')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Alamat Anda','class'=>'form-control']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-photo"></i></span>
            <?= $form->field($model, 'foto')->fileInput() ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <?= $form->field($model, 'no_handphone')->textInput(['maxlength' => true,'placeholder'=>'Masukkan No Handphone Anda','class'=>'form-control']) ?>
            </div>
          </center>

          </div>
        </div>
        <!-- /.box-body -->
        <center>
          <div class="box-footer">
            <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    				<button type="reset" class="btn btn-inverse">Reset</button>
          </div>
        </center>
      </form>
    </div>
    <!-- /.box -->
    <?php ActiveForm::end(); ?>
  </div>
  <!--/.col (left) -->
  <!-- right column -->

  <!--/.col (right) -->
</div>
