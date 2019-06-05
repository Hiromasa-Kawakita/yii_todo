<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "todos".
 *
 * @property int $id
 * @property string $task
 * @property int $done
 */
class Todos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'todos';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task'], 'required'],
            [['done'], 'integer'],
            [['task'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task' => 'Task',
            'done' => 'Done',
        ];
    }
}
