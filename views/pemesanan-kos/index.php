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
        <?= Html::a('Tambah Pemesanan Kos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Fungsi tabel GridView yang lama -->

     <!-- GridView::widget([
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
    ]);  -->

    <!-- Fungsi tabel yang baru menggunakan HTML -->
    <div class="box">
      <div class="box-header">
        <b><center> <h3 class="box-title">Data Pemesanan Kos</h3> </center></b>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Id Pemesanan Kos</center></th>
            <th><center>Id Kos</center></th>
            <th><center>Id Pengguna</center></th>
            <th><center>Status</center></th>
            <th><center>Review</center></th>
            <th><center>Aksi</center></th>
          </tr>
          </thead>
          <tbody>

            <?php
            $no=1;foreach($model as $db):
            ?>

          <tr>
            <td><center> <?= $no;?> </center></td>
            <td><center> <?= $db['id_pemesanan_kos'];?> </center></td>
            <td><center> <?= $db['id_kos'];?> </center></td>
            <td><center> <?= $db['id_pengguna'];?> </center></td>
            <td><center> <?= $db['status'];?> </center></td>
            <td><center> <?= $db['review'];?> </center></td>

            <td> <center>
          <?= Html::a('<i class="fa fa-search"></i>', ['/pemesanan-kos/view','id'=>$db['id_pemesanan_kos']], ['class' => 'btn btn-warning btn-xs']) ?>
          <?= Html::a('<i class="fa fa-pencil"></i>', ['/pemesanan-kos/update','id'=>$db['id_pemesanan_kos']], ['class' => 'btn btn-info btn-xs']) ?>
          <?= Html::a('<i class="fa fa-trash"></i>', ['/pemesanan-kos/delete', 'id' => $db['id_pemesanan_kos']], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                    'confirm' => 'anda yakin mau menghapus "'.$db['id_pemesanan_kos'].'"?',
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
