<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananKos */

$this->title = 'Update Pemesanan Kos: ' . $model->id_pemesanan_kos;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Kos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pemesanan_kos, 'url' => ['view', 'id' => $model->id_pemesanan_kos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemesanan-kos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
