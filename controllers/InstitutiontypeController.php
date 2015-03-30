<?php

namespace app\controllers;

use Yii;
use app\models\Institutiontype;
use app\models\InstitutiontypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\filters\AccessControl;
use yii\bootstrap\Modal;

/**
 * InstitutiontypeController implements the CRUD actions for Institutiontype model.
 */
class InstitutiontypeController extends Controller
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
     * Lists all Institutiontype models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstitutiontypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->post('hasEditable')) {
            $bookId = Yii::$app->request->post('editableKey');
            $model = Institutiontype::findOne($bookId);
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Institutiontype']);
            $post['Institutiontype'] = $posted;
            if ($model->load($post)) {

                $model->save();
                $output = '';
                /*if (isset($posted['name'])) {
                    $output =  Yii::$app->formatter->asDecimal($model->buy_amount, 2);
                }*/
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            }
            // return ajax json encoded response and exit
            echo $out;
            return;

        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

/*
        $searchModel = new InstitutiontypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
    }

    /**
     * Displays a single Institutiontype model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->request->post('hasEditable')) {
            $model=$this->findModel($id);
            print_r(Yii::$app->request->post);
            $post = [];
            $output = '';
            $posted = Yii::$app->request->post('Institutiontype');
            if (isset($posted['name'])) {
                $model->name=$posted['name'];
                $model->save();
                $output =  $model->name;
            }
            $out = Json::encode(['output'=>$output, 'message'=>'']);
            echo $out;
            return;

        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Institutiontype model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * http://www.yiiframework.com/wiki/690/render-a-form-in-a-modal-popup-using-ajax/
     */
    public function actionCreate()
    {
        $model = new Institutiontype();
        $model->created_at=date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) ) {

          $model->save();
            return $this->redirect(['index']);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Institutiontype model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->updated_at=date('Y-m-d H:i:s');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Institutiontype model.
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
     * Finds the Institutiontype model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Institutiontype the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Institutiontype::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
