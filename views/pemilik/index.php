<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PemilikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pemilik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemilik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pemilik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

      <!-- Fungsi tabel GridView yang lama -->

     <!-- GridView::widget([
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
    ]);  -->
    
    <!-- Fungsi tabel yang baru menggunakan HTML -->
    <div class="box">
      <div class="box-header">
        <b><center> <h3 class="box-title">Data Pemilik</h3> </center></b>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Id Pemilik</center></th>
            <th><center>Username</center></th>
            <th><center>Password</center></th>
            <th><center>Nama Pemilik</center></th>
            <th><center>Alamat</center></th>
            <th><center>Aksi</center></th>
          </tr>
          </thead>
          <tbody>

            <?php
            $no=1;foreach($model as $db):
            ?>

          <tr>
            <td><center> <?= $no;?> </center></td>
            <td><center> <?= $db['id_pemilik'];?> </center></td>
            <td><center> <?= $db['username'];?> </center></td>
            <td><center> <?= $db['password'];?> </center></td>
            <td><center> <?= $db['nama_lengkap'];?> </center></td>
            <td><center> <?= $db['alamat'];?> </center></td>

            <td> <center>
          <?= Html::a('<i class="fa fa-search"></i>', ['/pemilik/view','id'=>$db['id_pemilik']], ['class' => 'btn btn-warning']) ?>
          <?= Html::a('<i class="fa fa-pencil"></i>', ['/pemilik/update','id'=>$db['id_pemilik']], ['class' => 'btn btn-info']) ?>
          <?= Html::a('<i class="fa fa-trash"></i>', ['/pemilik/delete', 'id' => $db['id_pemilik']], [
                    'class' => 'btn btn-danger',
                    'data' => [
                    'confirm' => 'anda yakin mau menghapus "'.$db['username'].'"?',
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
