<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PemesananKontrakanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan Kontrakans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-kontrakan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pemesanan Kontrakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pemesanan_kontrakan',
            'id_pengguna',
            'id_kontrakan',
            'status',
            'review',
            //'rating',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
