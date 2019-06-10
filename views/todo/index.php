<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
// $todos = $todos -> getModels();
$this->title = 'Todo list';
$this->params['breadcrumbs'][] = $this->title;
// var_dump($todos);
?>
<h1>Todoリスト</h1>

<p>
    <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
</p>

--------------------------------------------------------------------------------------------------------
<?php 
foreach ($todos as $todo): ?>
    <li>
    <?= Html::beginForm(['done', 'id' => $todo->id], 'post') ?>
        <?php  if($todo->done == 0):?>
            <input type="checkbox" name="done" <?= $todo->done ? 'checked': ''; ?>>
            <input type="submit", value = "タスク更新">
        <?php else: ?>
            <?= Html::encode("[完了]") ?>
        <?php endif; ?>
        <?= Html::endForm() ?>
        
        <?= Html::encode("タスク：{$todo->task}") ?>

        <!-- <?= Html::encode("タスク：{$todo->task}, done：{$todo->done}") ?> -->
        <!-- 
        <?= Html::beginForm(['todo/delete', 'id' => $todo->id], 'post') ?>
        <?= Html::submitButton('Delete Task', ['class' => 'btn btn-danger btn-xs']) ?>
        <?= Html::endForm() ?> 
        -->
        <p>
            <?= Html::a('Update', ['update', 'id' => $todo->id], ['class' => 'btn btn-primary btn-xs']) ?>
            <?= Html::a('Detail', ['view', 'id' => $todo->id], ['class' => 'btn btn-success btn-xs']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $todo->id], [
                'class' => 'btn btn-danger btn-xs',
                'data' => [
                    'confirm' => 'このタスクを消去しますか?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </li>
--------------------------------------------------------------------------------------------------------
<?php endforeach; ?>

<p>
    
</p>



<!--

HTTP metthod
GET POST PUT DELETE
HTML
a link
submit

-->