<?php

namespace app\controllers;

use Yii;
use app\models\PostImagen;
use app\models\PostImagenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostImagenController implements the CRUD actions for PostImagen model.
 */
class PostImagenController extends Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

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
     * Lists all PostImagen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostImagenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PostImagen model.
     * @param integer $post_id
     * @param integer $imagen_id
     * @return mixed
     */
    public function actionView($post_id, $imagen_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($post_id, $imagen_id),
        ]);
    }

    /**
     * Creates a new PostImagen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PostImagen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'post_id' => $model->post_id, 'imagen_id' => $model->imagen_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PostImagen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $post_id
     * @param integer $imagen_id
     * @return mixed
     */
    public function actionUpdate($post_id, $imagen_id)
    {
        $model = $this->findModel($post_id, $imagen_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'post_id' => $model->post_id, 'imagen_id' => $model->imagen_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PostImagen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $post_id
     * @param integer $imagen_id
     * @return mixed
     */
    public function actionDelete($post_id, $imagen_id)
    {
        $this->findModel($post_id, $imagen_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PostImagen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $post_id
     * @param integer $imagen_id
     * @return PostImagen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($post_id, $imagen_id)
    {
        if (($model = PostImagen::findOne(['post_id' => $post_id, 'imagen_id' => $imagen_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
