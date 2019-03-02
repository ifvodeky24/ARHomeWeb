<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananKontrakan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <?php $form = ActiveForm::begin(); ?>
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <center><h3 class="box-title">Form Pemesanan Kontrakan</h3><center>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form">
        <div class="box-body">
          <div class="form-group">

            <center>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-compass"></i></span>
            <?= $form->field($model, 'id_pengguna')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Id Kontrakan','class'=>'form-control']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-compass"></i></span>
            <?= $form->field($model, 'id_kontrakan')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Id Pengguna','class'=>'form-control']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-flag-o"></i></span>
            <?= $form->field($model, 'status')->dropDownList([ 'booking' => 'Booking', 'dalam pemesanan' => 'Dalam pemesanan', 'selesai' => 'Selesai', '' => '', ], ['prompt' => '']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-magic"></i></span>
            <?= $form->field($model, 'review')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Review','class'=>'form-control']) ?>
            </div>

            <br>

            <div class="input-group col-sm-8"> 
                <span class="input-group-addon"><i class="fa fa-star"></i></span>
            <?= $form->field($model, 'rating')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Rating','class'=>'form-control']) ?>
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
