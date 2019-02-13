<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananKontrakan */

$this->title = 'Tambah Pemesanan Kontrakan';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Kontrakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-kontrakan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
