<?php

namespace app\controllers;

use Yii;
use app\models\PhforumVideo;
use app\models\PhforumVideoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * PhforumVideoController implements the CRUD actions for PhforumVideo model.
 */
class PhforumVideoController extends Controller
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
     * Lists all PhforumVideo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhforumVideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhforumVideo model.
     * @param integer $phforum_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionView($phforum_id, $video_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($phforum_id, $video_id),
        ]);
    }

    /**
     * Creates a new PhforumVideo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhforumVideo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'phforum_id' => $model->phforum_id, 'video_id' => $model->video_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PhforumVideo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $phforum_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionUpdate($phforum_id, $video_id)
    {
        $model = $this->findModel($phforum_id, $video_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'phforum_id' => $model->phforum_id, 'video_id' => $model->video_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PhforumVideo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $phforum_id
     * @param integer $video_id
     * @return mixed
     */
    public function actionDelete($phforum_id, $video_id)
    {
        $this->findModel($phforum_id, $video_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PhforumVideo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $phforum_id
     * @param integer $video_id
     * @return PhforumVideo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($phforum_id, $video_id)
    {
        if (($model = PhforumVideo::findOne(['phforum_id' => $phforum_id, 'video_id' => $video_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
