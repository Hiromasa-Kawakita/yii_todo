<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todo-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'datetime')->textInput(['maxlength' => true])->hint("期限を記入してください 例：2019-06-03 12:30:00")->label("期限") ?>


<?= $form->field($model, 'task')->textInput(['maxlength' => true])->hint("タスクを入力してください。(最大255文字)")->label("タスク") ?>

<?= $form->field($model, 'description')->textInput(['maxlength' => true])->hint("タスクの詳細を入力してください。(最大255文字)")->label("メモ") ?>

<P>
    <?= $form->field($model, 'category')->dropdownList([
            "イベント" => 'イベント', 
            "タスク" => 'タスク',
            "アイディア" => 'アイディア',
            "プラン" => 'プラン',
            "イシュー" => 'イシュー'
        ],
        ['prompt'=>'カテゴリーを選択してください']
    )->label("カテゴリー");
    ?>
</P>

<P>
    <?= $form->field($model, 'priority')->dropdownList([
            1 => '!', 
            2 => '!!',
            3 => '!!!'
        ],
        ['prompt'=>'優先度を選択してください']
    )->label("優先度");
    ?>
</P>

<div class="form-group">
    <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>