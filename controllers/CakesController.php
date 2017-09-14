<?php

namespace app\controllers;

use Yii;
use app\models\Cake;
use app\models\CakeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CakeController implements the CRUD actions for Cake model.
 */
class CakesController extends Controller
{
    /**
     * @inheritdoc
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

    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest){
            $this->redirect(\Yii::$app->getHomeUrl());
        }
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    /**
     * Lists all Cake models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CakeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $model->updateCounter();
        return $this->render('view', ['model' => $model]);
    }


    /**
     * Creates a new Cake model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cake();

        $model->created_at = Yii::$app->formatter->asDatetime(time());
        $model->updated_at = Yii::$app->formatter->asDatetime(time());

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->upload() && $model->save()){
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cake model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->updated_at = Yii::$app->formatter->asDatetime(time());

        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->upload() && $model->save()){
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cake model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteImage($id)
    {
        $model = $this->findModel($id);
        $model->image = '';
        $model->updated_at = Yii::$app->formatter->asDatetime(time());
        $model->save();
        return $this->redirect(['update', 'id' => $id]);
    }

    /**
     * Finds the Cake model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cake the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cake::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
