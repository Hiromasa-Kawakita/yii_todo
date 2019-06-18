<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "todos".
 *
 * @property int $id
 * @property string $task
 * @property string $description
 * @property int $done
 * @property string $priority
 * @property string $datetime
 * @property string $category
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
            [['task', 'datetime', 'category'], 'required'],
            [['done'], 'integer'],
            [['datetime'], 'safe'],
            [['task', 'description', 'category'], 'string', 'max' => 255],
            [['priority'], 'string', 'max' => 10],
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
            'description' => 'Description',
            'done' => 'Done',
            'priority' => 'Priority',
            'datetime' => 'Datetime',
            'category' => 'Category',
        ];
    }
}
