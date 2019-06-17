<?php

use yii\helpers\Html;

$this->title = '編集';
$this->params['breadcrumbs'][] = ['label' => 'Todo list', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1> <?= Html::encode($this->title) ?> </h1>

<?= $this->render('_form', [
        'model' => $model,
    ]) ?>