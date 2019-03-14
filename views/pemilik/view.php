<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pemilik */

$this->title = $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Pemilik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pemilik-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pemilik], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pemilik], [
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
            'id_pemilik',
            'username',
            'password',
            'nama_lengkap',
            'alamat',
            [
                'label'=>'Foto',
                'format'=>'raw',
                'value' => function($data){
                    $url = Yii::$app->getHomeUrl()."/files/pemilik/".$data['foto'];
                    return Html::img($url,['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img', 'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
                }
            ],
            'no_handphone',
        ],
    ]) ?>

</div>
