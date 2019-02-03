<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Kos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'waktu_post')->textInput() ?>

    <?= $form->field($model, 'id_pemilik')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'altitude')->textInput() ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'tersedia' => 'Tersedia', 'tidak tersedia' => 'Tidak tersedia', 'tidak aktif' => 'Tidak aktif', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'stok_kamar')->textInput() ?>

    <?= $form->field($model, 'jenis_kos')->dropDownList([ 'laki laki' => 'Laki laki', 'perempuan' => 'Perempuan', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
