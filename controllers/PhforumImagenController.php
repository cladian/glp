<?php

namespace app\controllers;

use Yii;
use app\models\PhforumImagen;
use app\models\PhforumImagenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PhforumImagenController implements the CRUD actions for PhforumImagen model.
 */
class PhforumImagenController extends Controller
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
     * Lists all PhforumImagen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhforumImagenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhforumImagen model.
     * @param integer $phforum_id
     * @param integer $imagen_id
     * @return mixed
     */
    public function actionView($phforum_id, $imagen_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($phforum_id, $imagen_id),
        ]);
    }

    /**
     * Creates a new PhforumImagen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhforumImagen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'phforum_id' => $model->phforum_id, 'imagen_id' => $model->imagen_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PhforumImagen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $phforum_id
     * @param integer $imagen_id
     * @return mixed
     */
    public function actionUpdate($phforum_id, $imagen_id)
    {
        $model = $this->findModel($phforum_id, $imagen_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'phforum_id' => $model->phforum_id, 'imagen_id' => $model->imagen_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PhforumImagen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $phforum_id
     * @param integer $imagen_id
     * @return mixed
     */
    public function actionDelete($phforum_id, $imagen_id)
    {
        $this->findModel($phforum_id, $imagen_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PhforumImagen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $phforum_id
     * @param integer $imagen_id
     * @return PhforumImagen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($phforum_id, $imagen_id)
    {
        if (($model = PhforumImagen::findOne(['phforum_id' => $phforum_id, 'imagen_id' => $imagen_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
