<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kontrakan */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kontrakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kontrakan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kontrakan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kontrakan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kontrakan',
            'nama',
            'deskripsi',
            'alamat',
            'fasilitas',
            [
                'label'=>'Foto',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl()."/files/kontrakan/".$data['foto'];
                    return Html::img($url,['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img', 'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],
            [
                'label'=>'Foto 2',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl()."/files/kontrakan/".$data['foto_2'];
                    return Html::img($url,['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img', 'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],
            [
                'label'=>'Foto 3',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl()."/files/kontrakan/".$data['foto_3'];
                    return Html::img($url,['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img', 'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],
            'waktu_post',
            'pemilik.nama_lengkap',
            'pemilik.no_handphone',
            'latitude',
            'longitude',
            'altitude',
            'harga',
            'rating',
            'status',
        ],
    ]) ?>

</div>
