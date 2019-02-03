<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananKontrakanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemesanan-kontrakan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pemesanan_kontrakan') ?>

    <?= $form->field($model, 'id_pengguna') ?>

    <?= $form->field($model, 'id_kontrakan') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'review') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
