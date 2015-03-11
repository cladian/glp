<?php

namespace app\controllers;

use Yii;
use app\models\TopicDocument;
use app\models\TopicDocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TopicDocumentController implements the CRUD actions for TopicDocument model.
 */
class TopicDocumentController extends Controller
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
     * Lists all TopicDocument models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TopicDocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TopicDocument model.
     * @param integer $topic_id
     * @param integer $document_id
     * @return mixed
     */
    public function actionView($topic_id, $document_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($topic_id, $document_id),
        ]);
    }

    /**
     * Creates a new TopicDocument model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TopicDocument();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'topic_id' => $model->topic_id, 'document_id' => $model->document_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TopicDocument model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $topic_id
     * @param integer $document_id
     * @return mixed
     */
    public function actionUpdate($topic_id, $document_id)
    {
        $model = $this->findModel($topic_id, $document_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'topic_id' => $model->topic_id, 'document_id' => $model->document_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TopicDocument model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $topic_id
     * @param integer $document_id
     * @return mixed
     */
    public function actionDelete($topic_id, $document_id)
    {
        $this->findModel($topic_id, $document_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TopicDocument model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $topic_id
     * @param integer $document_id
     * @return TopicDocument the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($topic_id, $document_id)
    {
        if (($model = TopicDocument::findOne(['topic_id' => $topic_id, 'document_id' => $document_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
