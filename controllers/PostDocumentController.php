<?php

namespace app\controllers;

use Yii;
use app\models\PostDocument;
use app\models\PostDocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostDocumentController implements the CRUD actions for PostDocument model.
 */
class PostDocumentController extends Controller
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
     * Lists all PostDocument models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostDocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PostDocument model.
     * @param integer $post_id
     * @param integer $document_id
     * @return mixed
     */
    public function actionView($post_id, $document_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($post_id, $document_id),
        ]);
    }

    /**
     * Creates a new PostDocument model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PostDocument();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'post_id' => $model->post_id, 'document_id' => $model->document_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PostDocument model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $post_id
     * @param integer $document_id
     * @return mixed
     */
    public function actionUpdate($post_id, $document_id)
    {
        $model = $this->findModel($post_id, $document_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'post_id' => $model->post_id, 'document_id' => $model->document_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PostDocument model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $post_id
     * @param integer $document_id
     * @return mixed
     */
    public function actionDelete($post_id, $document_id)
    {
        $this->findModel($post_id, $document_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PostDocument model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $post_id
     * @param integer $document_id
     * @return PostDocument the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($post_id, $document_id)
    {
        if (($model = PostDocument::findOne(['post_id' => $post_id, 'document_id' => $document_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
