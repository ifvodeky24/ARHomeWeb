<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PemesananKosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan Kos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-kos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pemesanan Kos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pemesanan_kos',
            'id_kos',
            'id_pengguna',
            'status',
            'review',
            //'rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
