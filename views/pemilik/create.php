<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pemilik */

$this->title = 'Tambah Pemilik';
$this->params['breadcrumbs'][] = ['label' => 'Pemilik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemilik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
