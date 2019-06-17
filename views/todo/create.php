<?php

use yii\helpers\Html;

$this->title = '新規作成';
$this->params['breadcrumbs'][] = ['label' => 'Todo list', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- <h1> <?= Html::encode($this->title) ?> </h1> -->
<h1>新規タスク</h1>

<?= $this->render('_form', [
        'model' => $model,
    ]) ?>