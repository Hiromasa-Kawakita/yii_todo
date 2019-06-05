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
<h1>todoリスト</h1>

<p>
    <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<?php
foreach ($todos as $todo): ?>
    <li>
        <?= Html::encode("{$todo->id}, {$todo->task}, {$todo->done}") ?>
    </li>
<?php endforeach; ?>