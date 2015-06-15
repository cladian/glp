<?php

namespace app\controllers;

use Yii;
use app\models\Userphforum;
use app\models\UserphforumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserphforumController implements the CRUD actions for Userphforum model.
 */
class UserphforumController extends Controller
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
     * Lists all Userphforum models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserphforumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userphforum model.
     * @param integer $phforum_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($phforum_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($phforum_id, $user_id),
        ]);
    }

    /**
     * Creates a new Userphforum model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userphforum();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'phforum_id' => $model->phforum_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Updates an existing Userphforum model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $phforum_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($phforum_id, $user_id)
    {
        $model = $this->findModel($phforum_id, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'phforum_id' => $model->phforum_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Userphforum model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $phforum_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($phforum_id, $user_id)
    {
        $this->findModel($phforum_id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Userphforum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $phforum_id
     * @param integer $user_id
     * @return Userphforum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($phforum_id, $user_id)
    {
        if (($model = Userphforum::findOne(['phforum_id' => $phforum_id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
