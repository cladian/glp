<?php

namespace app\controllers;

use Yii;
use app\models\TopicVideo;
use app\models\TopicVideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * TopicVideoController implements the CRUD actions for TopicVideo model.
 */
class TopicVideoController extends Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create','update','delete'],
                // 'only' => ['login', 'logout', 'signup','event','admuser'],
                'rules' => [
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['asocam','sysadmin'],
                    ],
                    [
                        'actions' => ['index','create','update','delete'],
                        'allow' => false,
                        'roles' => ['*'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TopicVideo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TopicVideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TopicVideo model.
     * @param integer $topic_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionView($topic_id, $video_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($topic_id, $video_id),
        ]);
    }

    /**
     * Creates a new TopicVideo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TopicVideo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'topic_id' => $model->topic_id, 'video_id' => $model->video_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TopicVideo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $topic_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionUpdate($topic_id, $video_id)
    {
        $model = $this->findModel($topic_id, $video_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'topic_id' => $model->topic_id, 'video_id' => $model->video_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TopicVideo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $topic_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionDelete($topic_id, $video_id)
    {
        $this->findModel($topic_id, $video_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TopicVideo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $topic_id
     * @param integer $video_id
     * @return TopicVideo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($topic_id, $video_id)
    {
        if (($model = TopicVideo::findOne(['topic_id' => $topic_id, 'video_id' => $video_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
