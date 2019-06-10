<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->task;
$this->params['breadcrumbs'][] = ['label' => 'Todo list', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="country-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'このタスクを消去しますか?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= Html::encode("タスク[{$model->task}], チェックボックス[{$model->done}]") ?>

</div>