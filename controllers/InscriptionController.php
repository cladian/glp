<?php

namespace app\controllers;

use app\models\Event;
use app\models\Eventanswer;
use app\models\Eventquestion;
use app\models\Registertype;
use Yii;
use app\models\Inscription;
use app\models\Profile;
use app\models\Logistic;
use app\models\Answer;
use app\models\EventanswerSearch;
use app\models\AnswerSearch;
use app\models\RequestSearch;
use app\models\Generalquestion;
use app\models\InscriptionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\helpers\Url;
// BUILD FORM
use yii\data\ActiveDataProvider;






// links and alerts


/**
 * InscriptionController implements the CRUD actions for Inscription model.
 */
class InscriptionController extends Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'detail', 'subcat', 'createown', 'updateown', 'detailown', 'viewown'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'detail', 'view'],
                        'allow' => true,
                        'roles' => ['asocam', 'sysadmin'],
                    ],
                    [
                        'actions' => ['createown', 'updateown', 'subcat', 'detailown', 'viewown', 'indexown'],
                        'allow' => true,
                        'roles' => ['user'],
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

    public function actionIndexown()
    {
        $searchModel = new InscriptionSearch();
        $dataProvider = $searchModel->searchByuser(Yii::$app->request->queryParams, yii::$app->user->identity->id);


        return $this->render('indexown', [
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
        $model = $this->findModel($id);
        $modelLogistic = Logistic::find()->where(['inscription_id' => $id])->one();


        $searchModelEventanswer = new EventanswerSearch();
        $dataProviderEventanswer = $searchModelEventanswer->searchByInscription(Yii::$app->request->queryParams, $id);

        $searchModelAnswer = new AnswerSearch();
        $dataProviderAnswer = $searchModelAnswer->searchByAnswer(Yii::$app->request->queryParams, $id);

        $searchModelRequest = new RequestSearch();
        $dataProviderRequest = $searchModelRequest->searchByInscription(Yii::$app->request->queryParams, $id);

        $modelProfile = Profile::find()
            ->where(['user_id' => $model->user_id])
            ->one();

        // Verificación de funcion es editables
        if (Yii::$app->request->post('hasEditable')) {

            // Verificar que modelo se esta enviando
            if (isset($_POST['Eventanswer'])) {

                $eventanswerId = Yii::$app->request->post('editableKey');
                $modelEventanswer = Eventanswer::findOne($eventanswerId);
                $post = [];
                $posted = current($_POST['Eventanswer']);
                $post['Eventanswer'] = $posted;
                if ($modelEventanswer->load($post)) {
                    $modelEventanswer->status = self::STATUS_ACTIVE;
                    if ((isset($posted['reply'])) && (strlen($posted['reply']) > 0)) {
                        $modelEventanswer->status = self::STATUS_ACTIVE;
                    } else {
                        $modelEventanswer->reply = NULL;
                    }
                    $modelEventanswer->save();

                }
            }

            if (isset($_POST['Answer'])) {
                $answerId = Yii::$app->request->post('editableKey');
                $modelAnswer = Answer::findOne($answerId);
                $post = [];
                $posted = current($_POST['Answer']);
                $post['Answer'] = $posted;
                if ($modelAnswer->load($post)) {
                    $modelAnswer->status = self::STATUS_ACTIVE;
                    if ((isset($posted['reply'])) && (strlen($posted['reply']) > 0)) {
                        $modelAnswer->status = self::STATUS_ACTIVE;
                    } else {
                        $modelAnswer->reply = NULL;
                    }
                    $modelAnswer->save();

                }
            }
            $output = '';
            $out = Json::encode(['output' => $output, 'message' => '']);
            echo $out;
            return;


        }

        return $this->render('view', [
            'model' => $model,
            'modelLogistic' => $modelLogistic,
            'searchModelEventanswer' => $searchModelEventanswer,
            'dataProviderEventanswer' => $dataProviderEventanswer,
            'searchModelAnswer' => $searchModelAnswer,
            'dataProviderAnswer' => $dataProviderAnswer,
            'searchModelRequest' => $searchModelRequest,
            'dataProviderRequest' => $dataProviderRequest,
            'modelProfile'=>$modelProfile
        ]);
    }

    public function actionViewown($id)
    {
        //Validar Pertenencia de Inscripción
        if ($this->actionOwn($id, Yii::$app->user->id)) {


            $model = $this->findModel($id);
            $modelLogistic = Logistic::find()->where(['inscription_id' => $id])->one();


            $searchModelEventanswer = new EventanswerSearch();
            $dataProviderEventanswer = $searchModelEventanswer->searchByInscription(Yii::$app->request->queryParams, $id);

            $searchModelAnswer = new AnswerSearch();
            $dataProviderAnswer = $searchModelAnswer->searchByAnswer(Yii::$app->request->queryParams, $id);

            $searchModelRequest = new RequestSearch();
            $dataProviderRequest = $searchModelRequest->searchByInscription(Yii::$app->request->queryParams, $id);

            $modelProfile = Profile::find()
                ->where(['user_id' => Yii::$app->user->id])
                ->one();

            // Verificación de funcion es editables
            if (Yii::$app->request->post('hasEditable')) {

                // Verificar que modelo se esta enviando
                if (isset($_POST['Eventanswer'])) {

                    $eventanswerId = Yii::$app->request->post('editableKey');
                    $modelEventanswer = Eventanswer::findOne($eventanswerId);
                    $post = [];
                    $posted = current($_POST['Eventanswer']);
                    $post['Eventanswer'] = $posted;
                    if ($modelEventanswer->load($post)) {
                        $modelEventanswer->status = self::STATUS_ACTIVE;
                        if ((isset($posted['reply'])) && (strlen($posted['reply']) > 0)) {
                            $modelEventanswer->status = self::STATUS_ACTIVE;
                        } else {
                            $modelEventanswer->reply = NULL;
                        }
                        $modelEventanswer->save();

                    }
                }

                if (isset($_POST['Answer'])) {
                    $answerId = Yii::$app->request->post('editableKey');
                    $modelAnswer = Answer::findOne($answerId);
                    $post = [];
                    $posted = current($_POST['Answer']);
                    $post['Answer'] = $posted;
                    if ($modelAnswer->load($post)) {
                        $modelAnswer->status = self::STATUS_ACTIVE;
                        if ((isset($posted['reply'])) && (strlen($posted['reply']) > 0)) {
                            $modelAnswer->status = self::STATUS_ACTIVE;
                        } else {
                            $modelAnswer->reply = NULL;
                        }
                        $modelAnswer->save();

                    }
                }
                $output = '';
                $out = Json::encode(['output' => $output, 'message' => '']);
                echo $out;
                return;

            }

            return $this->render('viewown', [
                'model' => $model,
                'modelLogistic' => $modelLogistic,
                'searchModelEventanswer' => $searchModelEventanswer,
                'dataProviderEventanswer' => $dataProviderEventanswer,
                'searchModelAnswer' => $searchModelAnswer,
                'dataProviderAnswer' => $dataProviderAnswer,
                'searchModelRequest' => $searchModelRequest,
                'dataProviderRequest' => $dataProviderRequest,
                'modelProfile'=>$modelProfile,

            ]);
        }
        throw new \yii\web\HttpException(403,\Yii::$app->params['errorOwn']);

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
        $modelLogistic =new Logistic();

            //Almacenamiento de ID de usuario logeado
        $model->user_id = Yii::$app->user->identity->id;
        $model->event_id = $id;


        //Verificación si el usuario tiene un registro previo al evento seleccionado

        if (Inscription::find()->where(['user_id' => Yii::$app->user->identity->id, 'event_id' => $id])->count() > 0) {
            // Opciones disponibles para loe errores: success - info - warning - danger
            \Yii::$app->getSession()->setFlash('danger', 'Usted dispone de una inscripción previa al evento, por favor complete la información de éste registro');
            return $this->redirect(['inscription/viewown', 'id' => Inscription::find()->where(['user_id' => Yii::$app->user->identity->id, 'event_id' => $id])->one()->id]);
        }

        // Si es una inscripción nueva
        if (    $model->load(Yii::$app->request->post()) &&  $modelLogistic->load(Yii::$app->request->post()) ) {

            $model->save();
            //Almacenamiento de registro Logistica en Blanco

            $modelLogistic->inscription_id = $model->id;
            $modelLogistic->save();

            //Almacenamiento de registro Answers en blanco

            $modelgeneralquestion = Generalquestion::find()->where(['status' => self::STATUS_ACTIVE])->all();
            foreach ($modelgeneralquestion as $answer) {
                $modelanswer = new Answer();
                $modelanswer->inscription_id = $model->id;
                $modelanswer->question_id = $answer->id;
                $modelanswer->save();

            }

            //Verificación de preguntas habilitadas para el evento, para esto es necesario ingresar desde el modelo de insctpción
            // y subir al registro de evento


            $modelEventQuestion = Eventquestion::find()->where(['status' => self::STATUS_ACTIVE, 'event_id' => $model->event->id])->all();
            foreach ($modelEventQuestion as $eventquestion) {
                $modelEvenAnswer = new Eventanswer();
                $modelEvenAnswer->inscription_id = $model->id;
                $modelEvenAnswer->eventquestion_id = $eventquestion->id;
                $modelEvenAnswer->save();
            }
            //++++++++++++++++++++++++++++++++++++++++
            // CALCULATE
            $this->calculate($model->id);
            //++++++++++++++++++++++++++++++++++++++++

            return $this->redirect(['eventanswer', 'id' => $model->id]);
        } else {
            return $this->render('createown', [
                'model' => $model,
                'modelLogistic' => $modelLogistic,
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

    public function actionUpdateown($id)
    {
        //$modelLogistic =new Logistic( );


        if ($this->actionOwn($id, Yii::$app->user->id)) {
            // búsqueda de modelo por dos parámetros
            $model = $this->findModelown($id, Yii::$app->user->id);
            $modelLogistic = Logistic::findOne([ 'inscription_id' => $id]);

            if (   $modelLogistic->load(Yii::$app->request->post())&&  $model->load(Yii::$app->request->post())   ) {

                $model->save();
                $modelLogistic->save();

                //++++++++++++++++++++++++++++++++++++++++
                // CALCULATE
                $this->calculate($model->id);
                //++++++++++++++++++++++++++++++++++++++++

                return $this->redirect(['eventanswer', 'id' => $model->id]);
            } else {

                return $this->render('updateown', [
                    'model' => $model,
                    'modelLogistic' => $modelLogistic,
                ]);
            }
        }
        throw new \yii\web\HttpException(403,\Yii::$app->params['errorOwn']);
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

    protected function findModelown($id, $user_id)
    {
        if (($model = Inscription::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*
     * Función para retorno de array de opciones
     */
    public function actionSubcat()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                // $parentClass=Registertype::findone($cat_id);
                $out = Registertype::find()
                    ->where(['status' => self::STATUS_ACTIVE, 'registertype_id' => $cat_id])
                    ->andWhere('id <> :id', [':id' => $cat_id])// funcion adicional para exluir el parent
                    ->asArray()// exportar en array para el dropdownlist
                    ->all();

                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);


    }

    // Retorno de info para Grid Administrador
    public function actionDetail()
    {
        if (isset($_POST['expandRowKey'])) {

            $inscriptionId = Yii::$app->request->post('expandRowKey');
            $modelLogistic = Logistic::find()
                ->where(['inscription_id' => $inscriptionId])
                ->one();

            $modelProfile = Profile::find()
                ->where(['user_id' => $modelLogistic->inscription->user_id])
                ->one();

            return $this->renderPartial('_detail', [
                'modelLogistic' => $modelLogistic,
                'modelProfile' => $modelProfile
            ]);
        } else {
            return '<div class="alert alert-danger">No data found</div>';
        }
    }

    /*
     * Solo para llamadas de usuario
     */
    public function actionDetailown()
    {
        if (isset($_POST['expandRowKey'])) {
            $inscriptionId = Yii::$app->request->post('expandRowKey');
            $model = $this->findModel($inscriptionId);
            $modelLogistic = Logistic::find()
                ->where(['inscription_id' => $inscriptionId])
                ->one();

            return $this->renderPartial('_detailown', [
                'modelLogistic' => $modelLogistic,
                'model' => $model,
            ]);
        } else {
            return '<div class="alert alert-danger">No data found</div>';
        }
    }

    /*
     * Verificación si la inscripción le pertenece al usuario que lo solicita
     */
    public function actionOwn($id, $user)
    {
        return Inscription::find()->where(['user_id' => $user, 'id' => $id])->count();
    }
    /*
     * Función para calcular los porcentajes de avance
     */
    public function calculate($id){
        //modelo para hacer actualización
        $model =$this->findModel($id);

        // contador de Logistic
        $items=0;
        $modelLogistic=Logistic::find()->where(['inscription_id'=>$id])->one();
        $itemsNotNull = 0;


        If ($modelLogistic->residence){
            $items=3;
            //1
            if ($modelLogistic->leavingonorigincity != NULL) $itemsNotNull++;
            //2
            if ($modelLogistic->accommodationdatein != NULL)$itemsNotNull++;
            //3
            if ($modelLogistic->accommodationdateout != NULL) $itemsNotNull++;
        }else{
            $items=11;
            //1
            if ($modelLogistic->leavingonorigincity != NULL) $itemsNotNull++;
            //2
            if ($modelLogistic->leavingonairline !=NULL) $itemsNotNull++;
            //3
            if ($modelLogistic->leavingonflightnumber != NULL) $itemsNotNull++;
            //4
            if ($modelLogistic->leavingondate != NULL) $itemsNotNull++;
            //5
            if ($modelLogistic->leavingonhour != NULL) $itemsNotNull++;
            //6
            if ($modelLogistic->returningonairline != NULL) $itemsNotNull++;
            //7
            if ($modelLogistic->returningonflightnumber != NULL) $itemsNotNull++;
            //8
            if ($modelLogistic->returningondate != NULL) $itemsNotNull++;
            //9
            if ($modelLogistic->returningonhour != NULL) $itemsNotNull++;
            //10
            if ($modelLogistic->accommodationdatein != NULL)$itemsNotNull++;
            //11
            if ($modelLogistic->accommodationdateout != NULL) $itemsNotNull++;
        }

        $model->complete_quiz=100;
        if ($model->getAnswers()->count()>0)
            $model->complete_quiz=round($model->getAnswers()->andWhere('LENGTH(reply)>0')->count()*100/ $model->getAnswers()->count());

        $model->complete_logistic=round($itemsNotNull*100/$items);


        $model->complete_eventquiz=100;
        if ($model->getEventanswers()->count()>0)
            $model->complete_eventquiz=round($model->getEventanswers()->andWhere('LENGTH(reply)>0')->count()*100/$model->getEventanswers()->count());

        $model->complete=round(($model->complete_quiz+ $model->complete_eventquiz+$model->complete_logistic)/3);

        if ($model->complete==100)
        {
            $html='<h4>Contenido </h4>';
            $html.='<kbd>'.$model->user->id.'</kbd>';
            $html.='<h4>Inquietud previa </h4>';
            $url= \Yii::$app->params['webRoot'].Url::to(['reply/create/', 'id' => $id]);

            $this->sendMail($model->request_id,$html, $url );

        }
        $model->save();
    }
// Pasar el $id de la Inscrpción
 public function actionEventanswer($id){

     //Vacio para la función  Eventanswer  Answer
     $model= new Eventanswer();

     //Enviamos parametro registros de preguntas por ID Inscripción
     // Cargo todas las preguntas por evento de la inscripción
     $searchModel = Eventanswer::find()->where(['inscription_id'=>$id])->indexBy('id');
     $dataProvider = new ActiveDataProvider([
         'query' => $searchModel,
     ]);

     //Guardar multiples modelos
     // Modificar los modelos de trabajo Eventanswer::  Answers::
     $models=$dataProvider->getModels();
     if (Eventanswer::loadMultiple($models, Yii::$app->request->post()) && Eventanswer::validateMultiple($models)) {
         $count = 0;
         foreach ($models as $index => $item) {
             // populate and save records for each model
             if ($item->save()) {
                 $count++;
             }
         }
         Yii::$app->session->setFlash('success', " {$count} Registros procesados exitosamente.");

         //++++++++++++++++++++++++++++++++++++++++
         // CALCULATE
         $this->calculate($id);
         //++++++++++++++++++++++++++++++++++++++++

         return $this->redirect(['answer', 'id' => $id]);
     }


     return $this->render('_eventanswers', [
         'searchModel' => $searchModel,
         'dataProvider' => $dataProvider,
         'model' => $model,
         'id'=>$id,
     ]);
    }

    public function actionAnswer($id){
        //Vacio para la función  Eventanswer  Answer
        $model= new Answer();

        //Enviamos parametro registros de preguntas por ID Inscripción
        // Cargo todas las preguntas por evento de la inscripción
        $searchModel = Answer::find()->where(['inscription_id'=>$id])->indexBy('id');
        $dataProvider = new ActiveDataProvider([
            'query' => $searchModel,
        ]);

        //Guardar multiples modelos
        // Modificar los modelos de trabajo Eventanswer::  Answers::
        $models=$dataProvider->getModels();
        if (Answer::loadMultiple($models, Yii::$app->request->post()) && Answer::validateMultiple($models)) {
            $count = 0;
            foreach ($models as $index => $item) {
                // populate and save records for each model
                if ($item->save()) {
                    $count++;
                }
            }
            Yii::$app->session->setFlash('success', " {$count} Registros procesados exitosamente.");

            //++++++++++++++++++++++++++++++++++++++++
            // CALCULATE
            $this->calculate($id);
            //++++++++++++++++++++++++++++++++++++++++

            return $this->redirect(['viewown', 'id' => $id]);
        }

        return $this->render('_answers', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'id' => $id,
        ]);
    }
    // sendmail

    protected function sendMail($inscription_id, $message, $url)
    {
        $title="Solicitud Completa";
        $content=$message;
        $modelReply=User::find()->where(['id'=> Yii::$app->user->identity->id]);
        foreach ($modelReply as $reply){
            // Contenido, tipo  1=Notificacion URL
            $reply->user->sendEmail($content, $url, $title);
        }


    }


}
