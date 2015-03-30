<?php

namespace app\controllers;

use Yii;
use app\models\Responsibilitytype;
use app\models\ResponsibilitytypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * ResponsibilitytypeController implements the CRUD actions for Responsibilitytype model.
 */
class ResponsibilitytypeController extends Controller
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
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete'],
                        'allow' => true,
                        'roles' => ['asocam','sysadmin'],
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
     * Lists all Responsibilitytype models.
     * @return mixed
     */
    public function actionIndex()
    {
        // Original
        //$searchModel = new ResponsibilitytypeSearch();
        $model= new Responsibilitytype();
        $searchModel = Responsibilitytype::find()->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $searchModel,
        ]);

    /*    $searchModel = new ResponsibilitytypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/
        $models=$dataProvider->getModels();

        if (Responsibilitytype::loadMultiple($models, Yii::$app->request->post()) && Responsibilitytype::validateMultiple($models)) {
            $count = 0;
            foreach ($models as $index => $item) {
                // populate and save records for each model
                if ($item->save()) {
                    $count++;
                }
            }
            Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
           // return $this->redirect(['index']); // redirect to your next desired page
        }
            // Original
   /*     $searchModel = new ResponsibilitytypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
            ]);

    }

    /**
     * Displays a single Responsibilitytype model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Responsibilitytype model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Responsibilitytype();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Responsibilitytype model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Responsibilitytype model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Responsibilitytype model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Responsibilitytype the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Responsibilitytype::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
