<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserCustom $model */

$this->title = 'Create User Custom';
$this->params['breadcrumbs'][] = ['label' => 'User Customs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-custom-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
