<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kos') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'foto') ?>

    <?= $form->field($model, 'waktu_post') ?>

    <?php // echo $form->field($model, 'id_pemilik') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'altitude') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'stok_kamar') ?>

    <?php // echo $form->field($model, 'jenis_kos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
