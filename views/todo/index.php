<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
// $todos = $todos -> getModels();
$this->title = 'Todoリスト';
$this->params['breadcrumbs'][] = $this->title;
// var_dump($todos);
?>
<h1>Todoリスト</h1>
<?= Html::encode("タスク数：{$count}, ") ?>
<?php echo "日付：".Yii::$app->formatter->asDate('now', 'php:Y-m-d');?>
<br>



<?php
// 現在の年月を取得
$year = date('Y');
$month = date('n');
 
// 月末日を取得
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
 
$calendar = array();
$j = 0;
 
// 月末日までループ
for ($i = 1; $i < $last_day + 1; $i++) {
 
    // 曜日を取得
    $week = date('w', mktime(0, 0, 0, $month, $i, $year));
 
    // 1日の場合
    if ($i == 1) {
 
        // 1日目の曜日までをループ
        for ($s = 1; $s <= $week; $s++) {
 
            // 前半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
 
        }
 
    }
 
    // 配列に日付をセット
    $calendar[$j]['day'] = $i;
    $j++;
 
    // 月末日の場合
    if ($i == $last_day) {
 
        // 月末日から残りをループ
        for ($e = 1; $e <= 6 - $week; $e++) {
 
            // 後半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
 
        }
 
    }
 
}
?>
<br>
<?php echo $year; ?>年<?php echo $month; ?>月のカレンダー
<br>
<table>
    <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
    </tr>
 
    <tr>
    <?php $cnt = 0; ?>
    <?php foreach ($calendar as $key => $value): ?>
 
        <td>
        <?php $cnt++; ?>
        <?php echo $value['day']; ?>
        </td>
 
    <?php if ($cnt == 7): ?>
    </tr>
    <tr>
    <?php $cnt = 0; ?>
    <?php endif; ?>
 
    <?php endforeach; ?>
    </tr>
</table>

<br><br>
<h4><?= Html::encode("フィルター") ?></h4>
<li>全体 : 
    <?= Html::a('ALL', ['index'], ['class' => 'btn btn-warning btn-sm']) ?>
    <?= Html::a('未完了フィルター', ['incompletefilter'], ['class' => 'btn btn-default btn-sm']) ?>
    <?= Html::a('完了フィルター', ['completefilter'], ['class' => 'btn btn-default btn-sm']) ?>
</li>
<br>
<li>カテゴリー : 
     <?= Html::a('イベント', ['eventfilter'], ['class' => 'btn btn-default btn-sm']) ?>
     <?= Html::a('タスク', ['taskfilter'], ['class' => 'btn btn-default btn-sm']) ?>
     <?= Html::a('アイディア', ['ideafilter'], ['class' => 'btn btn-default btn-sm']) ?>
     <?= Html::a('プラン', ['planfilter'], ['class' => 'btn btn-default btn-sm']) ?>
     <?= Html::a('イシュー', ['issuefilter'], ['class' => 'btn btn-default btn-sm']) ?>
</li>
<br>
<li>期限順：
    <?= Html::a('早い', ['datetimesort'], ['class' => 'btn btn-default btn-sm']) ?>
</li>
<br>
<li>優先度順：
    <?= Html::a('高い', ['prioritysort'], ['class' => 'btn btn-default btn-sm']) ?>
</li>
<br>

<p><?= Html::a('タスクを作成', ['create'], ['class' => 'btn btn-success']) ?></p>
--------------------------------------------------------------------------------------------------------
<?php 
foreach ($todos as $todo): ?>
    <?= Html::beginForm(['done', 'id' => $todo->id], 'post') ?>
        <?php  if($todo->done == 0):?>
            <input type="checkbox" name="done" <?= $todo->done ? 'checked': ''; ?>>
            <input type="submit", value = "完了">
        <?php else: ?>
            <?= Html::encode("[完了]") ?>
        <?php endif; ?>
        <?= Html::endForm() ?>

        <?php 
       switch ($todo->priority) {
        case 1:
            $priority = "!";
            break;
        case 2:
            $priority = "!!";
            break;
        case 3:
            $priority = "!!!";
            break;
        default:
            break;
    } 
        ?>

    <li> <?= Html::encode("タスク：{$todo->task}") ?> </li>
    <li> <?= Html::encode("メモ：{$todo->description}") ?> </li>
    <li> <?= Html::encode("カテゴリー：{$todo->category}") ?> </li>
    <li> <?= Html::encode("期限：{$todo->datetime}") ?> </li>
    <li> <?= Html::encode("優先度：{$priority}") ?> </li>

        <!-- 
        <?= Html::beginForm(['todo/delete', 'id' => $todo->id], 'post') ?>
        <?= Html::submitButton('Delete Task', ['class' => 'btn btn-danger btn-xs']) ?>
        <?= Html::endForm() ?> 
        -->

        <p>
            <?= Html::a('編集', ['update', 'id' => $todo->id], ['class' => 'btn btn-primary btn-xs']) ?>
            <?= Html::a('詳細', ['view', 'id' => $todo->id], ['class' => 'btn btn-success btn-xs']) ?>
            <?= Html::a('削除', ['delete', 'id' => $todo->id], [
                'class' => 'btn btn-danger btn-xs',
                'data' => [
                    'confirm' => 'このタスクを消去しますか?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

--------------------------------------------------------------------------------------------------------
<?php endforeach; ?>

<!--

HTTP metthod
GET POST PUT DELETE
HTML
a link
submit

-->