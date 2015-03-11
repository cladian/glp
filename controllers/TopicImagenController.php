<?php

namespace app\controllers;

use Yii;
use app\models\TopicImagen;
use app\models\TopicImagenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TopicImagenController implements the CRUD actions for TopicImagen model.
 */
class TopicImagenController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TopicImagen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TopicImagenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TopicImagen model.
     * @param integer $topic_id
     * @param integer $imagen_id
     * @return mixed
     */
    public function actionView($topic_id, $imagen_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($topic_id, $imagen_id),
        ]);
    }

    /**
     * Creates a new TopicImagen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TopicImagen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'topic_id' => $model->topic_id, 'imagen_id' => $model->imagen_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TopicImagen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $topic_id
     * @param integer $imagen_id
     * @return mixed
     */
    public function actionUpdate($topic_id, $imagen_id)
    {
        $model = $this->findModel($topic_id, $imagen_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'topic_id' => $model->topic_id, 'imagen_id' => $model->imagen_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TopicImagen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $topic_id
     * @param integer $imagen_id
     * @return mixed
     */
    public function actionDelete($topic_id, $imagen_id)
    {
        $this->findModel($topic_id, $imagen_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TopicImagen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $topic_id
     * @param integer $imagen_id
     * @return TopicImagen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($topic_id, $imagen_id)
    {
        if (($model = TopicImagen::findOne(['topic_id' => $topic_id, 'imagen_id' => $imagen_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
