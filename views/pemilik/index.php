<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PemilikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemiliks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemilik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pemilik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pemilik',
            'username',
            'password',
            'nama_lengkap',
            'alamat',
            //'foto',
            //'no_handphone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
