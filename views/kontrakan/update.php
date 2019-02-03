<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kontrakan */

$this->title = 'Update Kontrakan: ' . $model->id_kontrakan;
$this->params['breadcrumbs'][] = ['label' => 'Kontrakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kontrakan, 'url' => ['view', 'id' => $model->id_kontrakan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kontrakan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
