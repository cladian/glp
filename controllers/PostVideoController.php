<?php

namespace app\controllers;

use Yii;
use app\models\PostVideo;
use app\models\PostVideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostVideoController implements the CRUD actions for PostVideo model.
 */
class PostVideoController extends Controller
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
     * Lists all PostVideo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostVideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PostVideo model.
     * @param integer $post_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionView($post_id, $video_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($post_id, $video_id),
        ]);
    }

    /**
     * Creates a new PostVideo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PostVideo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'post_id' => $model->post_id, 'video_id' => $model->video_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PostVideo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $post_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionUpdate($post_id, $video_id)
    {
        $model = $this->findModel($post_id, $video_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'post_id' => $model->post_id, 'video_id' => $model->video_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PostVideo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $post_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionDelete($post_id, $video_id)
    {
        $this->findModel($post_id, $video_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PostVideo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $post_id
     * @param integer $video_id
     * @return PostVideo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($post_id, $video_id)
    {
        if (($model = PostVideo::findOne(['post_id' => $post_id, 'video_id' => $video_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
