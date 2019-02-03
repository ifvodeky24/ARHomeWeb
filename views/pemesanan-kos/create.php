<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PemesananKos */

$this->title = 'Create Pemesanan Kos';
$this->params['breadcrumbs'][] = ['label' => 'Pemesanan Kos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemesanan-kos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
