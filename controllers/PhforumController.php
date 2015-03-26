<?php

namespace app\controllers;

use Yii;
use app\models\Phforum;
use app\models\PhforumSearch;
use app\models\Document;
use app\models\Video;
use app\models\Imagen;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\PhforumDocument;
use app\models\PhforumVideo;
use app\models\PhforumImagen;

use app\models\TopicSearch;
use app\models\PhforumDocumentSearch;
use app\models\PhforumVideoSearch;
use app\models\PhforumImagenSearch;
/**
 * PhforumController implements the CRUD actions for Phforum model.
 */
class PhforumController extends Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

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
     * Lists all Phforum models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PhforumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Phforum model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchTopic = new TopicSearch();
        $dataProviderTopic = $searchTopic->searchByTopic(Yii::$app->request->queryParams, $id);

        $searchPDocument = new PhforumDocumentSearch();
        $dataProviderPDocument = $searchPDocument->searchByDocs(Yii::$app->request->queryParams , $id);

        $searchPVideo = new PhforumVideoSearch();
        $dataProviderPVideo = $searchPVideo->searchByVideos(Yii::$app->request->queryParams, $id);

        $searchPImagen = new PhforumImagenSearch();
        $dataProviderPImagen = $searchPImagen->searchByImagen(Yii::$app->request->queryParams, $id);


        return $this->render('view', [
            'model' => $this->findModel($id),

            'searchTopic' => $searchTopic,
            'dataProviderTopic' => $dataProviderTopic,

            'searchPDocument' => $searchPDocument,
            'dataProviderPDocument' => $dataProviderPDocument,

            'searchPVideo' => $searchPVideo,
            'dataProviderPVideo' => $dataProviderPVideo,

            'searchPImagen' => $searchPImagen,
            'dataProviderPImagen' => $dataProviderPImagen,




        ]);
    }

    /**
     * Creates a new Phforum model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Phforum();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionCreatedoc($id)
    {
        $model = new Document();
        $model->scenario = 'file';

        if ($model->load(Yii::$app->request->post())) {
            $doc = UploadedFile::getInstance($model, 'file');
            $docName = Yii::$app->security->generateRandomString().time() . '.' . $doc->extension;
            $doc->saveAs(\Yii::$app->params['foroDocs'] . $docName);
            $model->file = $docName;
            $model->save();

            //Guarda relación de documentos
            $modelPhforumDocument=new PhforumDocument;
            $modelPhforumDocument->phforum_id=$id;
            $modelPhforumDocument->document_id=$model->id;
            $modelPhforumDocument->save();


            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('createdoc', [
                'model' => $model,
            ]);
        }
    }


    public function actionCreatevideo($id)
    {
        $model = new Video();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Guarda relación de documentos
            $modelPhforumVideo=new PhforumVideo;
            $modelPhforumVideo->phforum_id=$id;
            $modelPhforumVideo->video_id=$model->id;
            $modelPhforumVideo->save();
            return $this->redirect(['view', 'id' => $id]);


        } else {
            return $this->render('createvideo', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreateimg($id)
    {
        $model = new Imagen();
        $model->scenario = 'file';

        if ($model->load(Yii::$app->request->post())) {
            $doc = UploadedFile::getInstance($model, 'file');
            $docName = Yii::$app->security->generateRandomString().time() . '.' . $doc->extension;
            // $docName =  'mauricio.' . $doc->extension;
            $doc->saveAs(\Yii::$app->params['foroImgs'] . $docName);
            $model->file = $docName;
            $model->save();

            //Guarda relación de documentos
            $modelPhforumImg=new PhforumImagen;
            $modelPhforumImg->phforum_id=$id;
            $modelPhforumImg->imagen_id=$model->id;
            $modelPhforumImg->save();

            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('createimg', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Phforum model.
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
     * Deletes an existing Phforum model.
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
     * Finds the Phforum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Phforum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Phforum::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
