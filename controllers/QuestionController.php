<?php

namespace app\controllers;

use Yii;
use app\models\Question;
use app\models\QuestionSearch;
use app\models\EventquestionSearch;
use app\models\Eventquestion;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create','update','delete'],
                // 'only' => ['login', 'logout', 'signup','event','admuser'],
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
     * Lists all Question models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Question model.
     * @param integer $id
     * @return mixed
     */

    public function actionView($id)
    {
        /*variables que activa la funcion grid en el EventQuestion*/

        $searchModelEventquestion = new EventquestionSearch();
        $dataProviderEventquestion = $searchModelEventquestion->searchByQuestion(Yii::$app->request->queryParams, $id );

        $searchModelGeneralquestion = new EventquestionSearch();
        $dataProviderGeneralquestion = $searchModelEventquestion->searchByQuestion(Yii::$app->request->queryParams, $id );

        $model=$this->findModel($id);


        return $this->render('view', [
            'model' => $model,
            'searchModelEventquestion' => $searchModelEventquestion,
            'dataProviderEventquestion' => $dataProviderEventquestion,

            'searchModelGeneralquestion' => $searchModelGeneralquestion,
            'dataProviderGeneralquestion' => $dataProviderGeneralquestion,

        ]);
    }

    /**
     * Creates a new Question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Question();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Question model.
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
     * Deletes an existing Question model.
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
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
