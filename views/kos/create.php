<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kos */

$this->title = 'Create Kos';
$this->params['breadcrumbs'][] = ['label' => 'Kos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
