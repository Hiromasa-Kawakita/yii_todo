<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Todos;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class TodoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Country models.
     * @return mixed
     */
    public function actionIndex()
    {
        // var_dump(Todos::find()->all());
        $todos = Todos::find()->orderBy("done")->all();
        //$todos = Todos::find()->where(['done'=>0])->all();
        return $this->render("index", ['todos' => $todos]);
    }


    public function actionView($id)
    {
        return $this->render("view", [
            "model" => $this->findModel($id),
        ]);
     }

    public function actionCreate()
    {
        $model = new Todos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    public function actionDone($id) 
    {
        $model = $this->findModel($id);        
        $done = Yii::$app->request->post('done');

        if (isset($done))
        {
            $model->done = 1;
            $model->save();
        } 
        else 
        {
            return $this->redirect(['index']);
        };

    //     var_dump($done);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
    } else {
        return $this->render('done', [
            'model' => $model,
            ]);
    }
}

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //updateで入力したデータをmodelインスタンスにロードできる且つ保存できるか否か
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        //fincOne($id)を代入した$modelがnullではなかったら、$modelを返す
        if (($model = Todos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}