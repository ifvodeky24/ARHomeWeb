<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KontrakanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kontrakan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontrakan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Kontrakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!-- Fungsi tabel GridView yang lama -->

     <!-- GridView::widget([
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
    ]);  -->

    <!-- Fungsi tabel yang baru menggunakan HTML -->
    <div class="box">
      <div class="box-header">
        <b><center> <h3 class="box-title">Data Kontrakan</h3> </center></b>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Id Kontrakan</center></th>
            <th><center>Nama</center></th>
            <th><center>Deskripsi</center></th>
            <th><center>Foto</center></th>
            <th><center>Waktu Post</center></th>
            <th><center>Status</center></th>
            <th><center>Aksi</center></th>
          </tr>
          </thead>
          <tbody>

            <?php
            $no=1;foreach($model as $db):
            ?>

          <tr>
            <td><center> <?= $no;?> </center></td>
            <td><center> <?= $db['id_kontrakan'];?> </center></td>
            <td><center> <?= $db['nama'];?> </center></td>
            <td><center> <?= $db['deskripsi'];?> </center></td>
            <td><center> <?= $db['foto'];?> </center></td>
            <td><center> <?= $db['waktu_post'];?> </center></td>
            <td><center> <?= $db['status'];?> </center></td>

            <td> <center>
          <?= Html::a('<i class="fa fa-search"></i>', ['/kontrakan/view','id'=>$db['id_kontrakan']], ['class' => 'btn btn-warning']) ?>
          <?= Html::a('<i class="fa fa-pencil"></i>', ['/kontrakan/update','id'=>$db['id_kontrakan']], ['class' => 'btn btn-info']) ?>
          <?= Html::a('<i class="fa fa-trash"></i>', ['/kontrakan/delete', 'id' => $db['id_kontrakan']], [
                    'class' => 'btn btn-danger',
                    'data' => [
                    'confirm' => 'anda yakin mau menghapus "'.$db['nama'].'"?',
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
