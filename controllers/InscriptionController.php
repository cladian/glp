<?php

namespace app\controllers;

use app\models\Registertype;
use Yii;
use app\models\Inscription;
use app\models\Logistic;
use app\models\Answer;
use app\models\Generalquestion;
use app\models\InscriptionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

// links and alerts


/**
 * InscriptionController implements the CRUD actions for Inscription model.
 */
class InscriptionController extends Controller
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
     * Lists all Inscription models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InscriptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inscription model.
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
     * Creates a new Inscription model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inscription();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * Utilizada para el almacenamiento de registros de los usuarios logeados, generalmente para crear los registros propios de cada uno de los perfiles
     */
    public function actionCreateown($id)
    {
        $model = new Inscription();


        //Almacenamiento de ID de usuario logeado
        $model->user_id=Yii::$app->user->identity->id;
        $model->event_id = $id;

        //Verificación si el usuario tiene un registro previo al evento seleccionado

        if (Inscription::find()->where(['user_id'=>Yii::$app->user->identity->id,'event_id'=>$id])->count() >0){
            // Opciones disponibles para loe errores: success - info - warning - danger
            \Yii::$app->getSession()->setFlash('danger', 'Usted dispone de una inscripción previa al evento, por favor complete la información de éste registro');
            return $this->redirect(['site/index']);
        }

        // Si es una inscripción nueva
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //Almacenamiento de registro Logistica en Blanco
            $modelLogistic = new Logistic();
            $modelLogistic -> inscription_id = $model->id;
            $modelLogistic -> save();

            //Almacenamiento de registro Answers en blanco

            $modelanswer= new Answer();
            $modelgeneralquestion = Generalquestion::find()->where(['status'=> 10])->all();
            foreach ($modelgeneralquestion as $answer)
            {
                $modelanswer->inscription_id=$model->id;
                $modelanswer->question_id=$answer->question_id;
                $modelanswer->save();

            }

            // Almacenamiento de registros EventAnswers en Blanco
            // Pendiente
            //
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('createown', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Inscription model.
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
     * Deletes an existing Inscription model.
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
     * Finds the Inscription model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inscription the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inscription::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /*
     * Función para retorno de array de opciones
     */
    public function actionSubcat(){
       $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
               // $parentClass=Registertype::findone($cat_id);
                $out=Registertype::find()
                    ->where(['status'=>10,'registertype_id'=> $cat_id])
                    ->andWhere('id <> :id', [':id' => $cat_id])  // funcion adicional para exluir el parent
                    ->asArray()  // exportar en array para el dropdownlist
                    ->all();

                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
           }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);


    }
}
