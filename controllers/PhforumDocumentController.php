<?php

namespace app\controllers;

use Yii;
use app\models\PhforumDocument;
use app\models\PhforumDocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Html;
/**
 * PhforumDocumentController implements the CRUD actions for PhforumDocument model.
 */
class PhforumDocumentController extends Controller
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
                        'actions' => ['view','delete'],
                        'allow' => true,
                        'roles' => ['asocam','sysadmin'],
                    ],
                    [
                        'actions' => ['index','create','update'],
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
     * Lists all PhforumDocument models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhforumDocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PhforumDocument model.
     * @param integer $phforum_id
     * @param integer $document_id
     * @return mixed
     */
    public function actionView($phforum_id, $document_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($phforum_id, $document_id),
        ]);
    }

    /**
     * Creates a new PhforumDocument model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PhforumDocument();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'phforum_id' => $model->phforum_id, 'document_id' => $model->document_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PhforumDocument model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $phforum_id
     * @param integer $document_id
     * @return mixed
     */
    public function actionUpdate($phforum_id, $document_id)
    {
        $model = $this->findModel($phforum_id, $document_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'phforum_id' => $model->phforum_id, 'document_id' => $model->document_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PhforumDocument model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $phforum_id
     * @param integer $document_id
     * @return mixed
     */
    public function actionDelete($phforum_id, $document_id)
    {
        if($this->findModel($phforum_id, $document_id)->delete()){

        return $this->redirect(['/phforum/view', 'id' => $phforum_id]);
        }else{
            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                'title' => Yii::t('yii', 'Delete'),
                'class'=>'btn btn-primary',
                'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                'data-method' => 'post',
                'data-pjax' => '0',
            ]);
        }

    }

    /**
     * Finds the PhforumDocument model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $phforum_id
     * @param integer $document_id
     * @return PhforumDocument the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($phforum_id, $document_id)
    {
        if (($model = PhforumDocument::findOne(['phforum_id' => $phforum_id, 'document_id' => $document_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
