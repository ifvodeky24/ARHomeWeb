<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kos */

$this->title = 'Update Kos: ' . $model->id_kos;
$this->params['breadcrumbs'][] = ['label' => 'Kos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kos, 'url' => ['view', 'id' => $model->id_kos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
