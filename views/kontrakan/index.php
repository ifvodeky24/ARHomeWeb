<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KontrakanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kontrakans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontrakan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kontrakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_kontrakan',
            'nama',
            'deskripsi',
            'foto',
            'waktu_post',
            //'id_pemilik',
            //'latitude',
            //'longitude',
            //'altitude',
            //'harga',
            //'rating',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
