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

        // $searchModel = new Todos();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $todos = Todos::find()->orderBy("done")->all();
        $count = Todos::find()->orderBy("done")->count();
        //$todos = Todos::find()->where(['done'=>0])->all();
        // return $this->render("index", ['todos' => $todos, 'count' => $count, 'searchModel' => $searchModel,
        // 'dataProvider' => $dataProvider]);
        return $this->render("index", ['todos' => $todos, 'count' => $count]);
    }

    /**
     * 
     * フィルター
     * 
     *  */
    public function actionIncompletefilter()
    {
        $todos = Todos::find()->where("done = 0")->all();
        $count = Todos::find()->where("done = 0")->count();
        return $this->render("incompletefilter", ['todos' => $todos, 'count' => $count]);
    }

    public function actionCompletefilter()
    {
        $todos = Todos::find()->where("done = 1")->all();
        $count = Todos::find()->where("done = 1")->count();
        return $this->render("completefilter", ['todos' => $todos, 'count' => $count]);
    }

    public function actionEventfilter()
    {
        $todos = Todos::find()->where("category = 'イベント'")->all();
        $count = Todos::find()->where("category = 'イベント'")->count();
        return $this->render("eventfilter", ['todos' => $todos, 'count' => $count]);
    }

    public function actionTaskfilter()
    {
        $todos = Todos::find()->where("category = 'タスク'")->all();
        $count = Todos::find()->where("category = 'タスク'")->count();
        return $this->render("taskfilter", ['todos' => $todos, 'count' => $count]);
    }

    public function actionIdeafilter()
    {
        $todos = Todos::find()->where("category = 'アイディア'")->all();
        $count = Todos::find()->where("category = 'アイディア'")->count();
        return $this->render("ideafilter", ['todos' => $todos, 'count'=> $count]);
    }

    public function actionPlanfilter()
    {
        $todos = Todos::find()->where("category = 'プラン'")->all();
        $count = Todos::find()->where("category = 'プラン'")->count();
        return $this->render("planfilter", ['todos' => $todos, 'count' => $count]);
    }

    public function actionIssuefilter()
    {
        $todos = Todos::find()->where("category = 'イシュー'")->all();
        $count = Todos::find()->where("category = 'イシュー'")->count();
        return $this->render("issuefilter", ['todos' => $todos, 'count' => $count]);
    }


    public function actionDatetimesort () 
    {
        $todos = Todos::find()->orderBy("datetime")->all();
        $count = Todos::find()->orderBy("done")->count();
        return $this->render("index", ['todos' => $todos, 'count' => $count]);
    }


    /**
     * 
     * CRUD
     * 
     */
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

    public function actionView($id)
    {
        return $this->render("view", [
            "model" => $this->findModel($id),
        ]);
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


    /**
     * 
     * Done
     * 
     */
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

        //var_dump($done);

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else 
        {
            return $this->render('done', [
                'model' => $model,
            ]);
        }
    }
}