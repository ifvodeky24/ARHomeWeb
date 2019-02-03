<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananKos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-kos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kos')->textInput() ?>

    <?= $form->field($model, 'id_pengguna')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'booking' => 'Booking', 'dalam pemesanan' => 'Dalam pemesanan', 'selesai' => 'Selesai', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'review')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
