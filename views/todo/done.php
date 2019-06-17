<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

// $this->title = 'Update "done" : '.$model->task;
$this->title = 'タスクを完了しました';
$this->params['breadcrumbs'][] = ['label' => 'Todo list', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1> <?= Html::encode($this->title) ?> </h1>


<?= Html::encode("タスク：[{$model->task}]は完了しました。") ?>