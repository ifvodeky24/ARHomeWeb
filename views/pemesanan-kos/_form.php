<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananKos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <?php $form = ActiveForm::begin(); ?>
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <center><h3 class="box-title">Form Pemesanan Kos</h3><center>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form">
        <div class="box-body">
          <div class="form-group">
            <?= $form->field($model, 'id_pengguna')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Id Kos','class'=>'form-control']) ?>
            <?= $form->field($model, 'id_kos')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Id Pengguna','class'=>'form-control']) ?>
            <?= $form->field($model, 'status')->dropDownList([ 'booking' => 'Booking', 'dalam pemesanan' => 'Dalam pemesanan', 'selesai' => 'Selesai', '' => '', ], ['prompt' => '']) ?>
            <?= $form->field($model, 'review')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Review','class'=>'form-control']) ?>
            <?= $form->field($model, 'rating')->textInput(['maxlength' => true,'placeholder'=>'Masukkan Rating','class'=>'form-control']) ?>
          </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  				<button type="reset" class="btn btn-inverse">Reset</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
    <?php ActiveForm::end(); ?>
  </div>
  <!--/.col (left) -->
  <!-- right column -->

  <!--/.col (right) -->
</div>
