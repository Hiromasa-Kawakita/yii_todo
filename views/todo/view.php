<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = "詳細";
$this->params['breadcrumbs'][] = ['label' => 'Todo list', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::encode("タスク名：[{$model->task}]") ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-xs']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-xs',
            'data' => [
                'confirm' => 'このタスクを消去しますか?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>