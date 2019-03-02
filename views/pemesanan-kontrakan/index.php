<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PemesananKontrakanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemesanan Kontrakan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-kontrakan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pemesanan Kontrakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Fungsi tabel GridView yang lama -->

    <!-- < GridView::widget([
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
    ]);  -->

    <!-- Fungsi tabel yang baru menggunakan HTML -->
    <div class="box">
      <div class="box-header">
        <b><center> <h3 class="box-title">Data Pemesanan Kontrakan</h3> </center></b>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Id Pemesanan Kontrakan</center></th>
            <th><center>Id Kontrakan</center></th>
            <th><center>Id Pengguna</center></th>
            <th><center>Status</center></th>
            <th><center>Aksi</center></th>
          </tr>
          </thead>
          <tbody>
            <!-- mencari no 1 di database -->
            <?php
            $no=1;foreach($model as $db):
            ?>

          <tr>
            <td><center> <?= $no;?> </center></td>
            <td><center> <?= $db['id_pemesanan_kontrakan'];?> </center></td>
            <td><center> <?= $db['id_kontrakan'];?> </center></td>
            <td><center> <?= $db['id_pengguna'];?> </center></td>
            <td><center> <?= $db['status'];?> </center></td>

            <td> <center>
          <?= Html::a('<i class="fa fa-search"></i>', ['/pemesanan-kontrakan/view','id'=>$db['id_pemesanan_kontrakan']], ['class' => 'btn btn-warning btn-xs']) ?>
          <?= Html::a('<i class="fa fa-pencil"></i>', ['/pemesanan-kontrakan/update','id'=>$db['id_pemesanan_kontrakan']], ['class' => 'btn btn-info btn-xs']) ?>
          <?= Html::a('<i class="fa fa-trash"></i>', ['/pemesanan-kontrakan/delete', 'id' => $db['id_pemesanan_kontrakan']], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                    'confirm' => 'anda yakin mau menghapus "'.$db['id_pemesanan_kontrakan'].'"?',
                    'method' => 'post',
                    ]
                    ]);
          ?>
          </center> </td>
          </tr>

           <?php $no++;endforeach; ?>

          </tbody>

        </table>
      </div>
      <!-- /.box-body -->
    </div>
</div>
