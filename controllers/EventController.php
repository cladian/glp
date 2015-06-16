<?php

namespace app\controllers;

use app\models\Eventanswer;
use app\models\Vgeneropais;
use app\models\Vresprofile;
use app\models\Vinsttprofile;
use Yii;
use app\models\Event;
use app\models\EventSearch;
use app\models\EventquestionSearch;
use app\models\InscriptionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'statistics'],
                // 'only' => ['login', 'logout', 'signup','event','admuser'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'resources', 'file', 'statistics'],
                        'allow' => true,
                        'roles' => ['asocam', 'sysadmin'],
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
     * Lists all Event models.
     * @return mixed
     */

    public function actionStatistics($id)
    {
        $searchModel = new InscriptionSearch();
        $dataProvider = $searchModel->searchByEvent(Yii::$app->request->queryParams, $id);
        /**
         * GENERO PAISES
         */

        $arr = array();
        $masculino = 0;
        $femenino = 0;
        // todos los paises
        foreach (Vgeneropais::find()->where(['event_id' => $id])->groupBy('iso')->all() as $pais) {
            $arr['pais'][] = $pais->iso;
            $genderM = 0;
            $genderF = 0;

            $m = Vgeneropais::find()->where(['event_id' => $id, 'iso' => $pais->iso, 'gender' => "M"])->one();
            $f = Vgeneropais::find()->where(['event_id' => $id, 'iso' => $pais->iso, 'gender' => "F"])->one();

            if ($m) $genderM = intval($m->cgender);
            if ($f) $genderF = intval($f->cgender);

            $arr['M'][] = $genderM;
            $arr['F'][] = $genderF;

            $masculino += $genderM;
            $femenino += $genderF;
        }
        // FIN Genero Paises

        /** Tipo de responsabilidades */

        $arrResp=array();
        foreach(Vresprofile::find()->where(['event_id'=>$id])->all() as $resptype){
            $arrResp["header"][]=$resptype->name;
            $arrResp["data"][]=$resptype->cresp;

        }

        $arrInstitucion=array();
        foreach(Vinsttprofile::find()->where(['event_id'=>$id])->all() as $insttype){
            $arrInstitucion["header"][]=$insttype->name;
            $arrInstitucion["data"][]=$insttype->cresp;

        }


        return $this->render('statistics', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arr' => $arr,
            'arrResp' => $arrResp,
            'arrInstitucion' => $arrInstitucion,
            'masculino' => $masculino,
            'femenino' => $femenino,
            'id'=>$id
        ]);
    }

    public function actionIndex()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $searchModel = new EventquestionSearch();

        // Edison despues de actualización
        //$dataProvider = $searchModel->searchByEvent(Yii::$app->request->queryParams, $model->eventtype_id);
        $dataProvider = $searchModel->searchByEvent(Yii::$app->request->queryParams, $id);
//        print_r($model);
        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();
        // Por defecto el status estará en 2= INACTIVO;
        $model->status = self::STATUS_INACTIVE;;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionResources($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'imagen';

        if ($model->load(Yii::$app->request->post())) {


            $avatar = UploadedFile::getInstance($model, 'photo');
            // $photoName = $model->id . '.' . $avatar->extension;
            $photoName = Yii::$app->security->generateRandomString() . time() . '.' . $avatar->extension;
            $avatar->saveAs(\Yii::$app->params['eventFolder'] . $photoName);
            $model->photo = $photoName;

            $model->save();


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('resources', [
                'model' => $model,
            ]);
        }
    }

    public function actionFile($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'documento';

        if ($model->load(Yii::$app->request->post())) {


            $file = UploadedFile::getInstance($model, 'file');
            // $fileName = $model->id . '.' . $file->extension;
            $fileName = Yii::$app->security->generateRandomString() . time() . '.' . $file->extension;
            $file->saveAs(\Yii::$app->params['eventDocs'] . $fileName);
            $model->file = $fileName;
            $model->save();


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('file', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            if (($model->getEventquestions()->andWhere(['status' => self::STATUS_ACTIVE])->count() == 0) && ($model->status == self::STATUS_ACTIVE)) {
                // WARNINGS
                \Yii::$app->getSession()
                    ->setFlash('danger',
                        'El evento no puede cambiar a estado activo hasta que agregue al menos una pregunta al evento');
                $model->status = self::STATUS_INACTIVE;
            }
//             print_r($model);(exit);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Event model.
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
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}

