<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap5\ActiveForm;

$this->registerJs(
    '$("document").ready(function(){ 
        $("#create_user").on("pjax:end", function() {
             $.pjax.reload({container:"#users"});  //Reload GridView
        });
    });'
);
?>

<div class="user-custom-form">

    <?php Pjax::begin(['id' => 'create_user']);
    $form = ActiveForm::begin(['options' => ['class' => 'row', 'data-pjax' => true]]); ?>

    <!-- User Custom -->
    <?= $form->field($userCustom, 'use_name', ['options' => ['class' => 'col-6']])->textInput(['maxlength' => true]) ?>
    <?= $form->field($userCustom, 'use_lastname', ['options' => ['class' => 'col-6']])->textInput(['maxlength' => true]) ?>
    <?= $form->field($userCustom, 'use_phone', ['options' => ['class' => 'col-6']])->textInput(['maxlength' => true]) ?>
    <?= $form->field($userCustom, 'state', ['options' => ['class' => 'col-6']])->textInput() ?>

    <!-- User -->
    <?= $form->field($user, 'username', ['options' => ['class' => 'col-6']])->textInput(['maxlength' => 255, 'autocomplete' => 'off'])->label('Correo') ?>
    <?= $form->field($user, 'password', ['options' => ['class' => 'col-6']])->passwordInput(['maxlength' => 255, 'autocomplete' => 'off']) ?>
    <?= $form->field($user, 'repeat_password', ['options' => ['class' => 'col-6']])->passwordInput(['maxlength' => 255, 'autocomplete' => 'off']) ?>

    <!-- Submit Button -->
    <div class="form-group col-6">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end();
    Pjax::end() ?>

</div>