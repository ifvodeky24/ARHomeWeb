<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kos */

$this->title = $model->id_kos;
$this->params['breadcrumbs'][] = ['label' => 'Kos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kos], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kos',
            'nama',
            'deskripsi',
            'foto',
            'waktu_post',
            'pemilik.nama_lengkap',
            'latitude',
            'longitude',
            'altitude',
            'harga',
            'rating',
            'status',
            'stok_kamar',
            'jenis_kos',
        ],
    ]) ?>

</div>
