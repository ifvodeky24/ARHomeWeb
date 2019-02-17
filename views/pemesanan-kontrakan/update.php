<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananKontrakan */

$this->title = 'Update Pemesanan Kontrakan: ' . $model->id_pemesanan_kontrakan;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Kontrakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pemesanan_kontrakan, 'url' => ['view', 'id' => $model->id_pemesanan_kontrakan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemesanan-kontrakan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
