<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todo-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'task')->textInput(['maxlength' => true])->hint("タスクを入力してください。(最大255文字)")->label("Task") ?>

<!-- <?= $form->field($model, 'done')->textInput()->hint("達成：1, 未達成：0を入力してください")->label("Done") ?> -->

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>