<?php

use yii\helpers\Html;
?>

<?= $this->render('index', [
        'todos' => $todos,
        'count' => $count
    ]) ?>