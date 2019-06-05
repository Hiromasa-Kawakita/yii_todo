<?php

use yii\helpers\Html;

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Todo list', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Create</h1>

<?= $this->render('_form', [
        'model' => $model,
    ]) ?>