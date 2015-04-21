<?php

namespace app\controllers;


use yii\helpers\Url;
use app\models\Topic;
use Yii;
use app\models\Phforum;
use app\models\PhforumSearch;
use app\models\Document;
use app\models\User;
use app\models\Video;
use app\models\Imagen;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'createdoc', 'createvideo', 'createimg', 'update', 'delete'],
                // 'only' => ['login', 'logout', 'signup','event','admuser'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'createdoc', 'createvideo', 'createimg', 'update', 'delete'],
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
        $dataProviderPDocument = $searchPDocument->searchByDocs(Yii::$app->request->queryParams, $id);

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
            $docName = Yii::$app->security->generateRandomString() . time() . '.' . $doc->extension;
            $doc->saveAs(\Yii::$app->params['foroDocs'] . $docName);
            $model->file = $docName;
            $model->save();

            //Guarda relación de documentos
            $modelPhforumDocument = new PhforumDocument;
            $modelPhforumDocument->phforum_id = $id;
            $modelPhforumDocument->document_id = $model->id;
            $modelPhforumDocument->save();

            \Yii::$app->getSession()->setFlash('success', 'El documento ha sido registrado éxitosamente');

            // Envio de notificación
            // http://localhost/glp/web/upload/docs/XyMVjkPLyyJGrxnTegyVynwFqEQvx2s21429652374.pdf
            $title = 'Nuevo documento Agregado';
            $html = '<p>Estimado participante el moderador del foro ha publicado un nuevo documento, puede revisar la información en el enlace a continuación</p>';
            $html .= '<p> Documento: ' . $model->name . '</p>';
            $html .= '<kbd>' . Yii::$app->user->identity->username . '</kbd>';
            $url = \Yii::$app->params['webRoot'] . Url::to(['foro/']);

            $this->sendMail($id, $html, $url, $title);


            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('createdoc', [
                'model' => $model,
                'id' => $id,
                'foro' => true,
                'topic' => false,
            ]);
        }
    }


    public function actionCreatevideo($id)
    {
        $model = new Video();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Guarda relación de documentos
            $modelPhforumVideo = new PhforumVideo;
            $modelPhforumVideo->phforum_id = $id;
            $modelPhforumVideo->video_id = $model->id;
            $modelPhforumVideo->save();
            \Yii::$app->getSession()->setFlash('success', 'El video ha sido registrado éxitosamente');
            return $this->redirect(['view', 'id' => $id]);


        } else {
            return $this->render('createvideo', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    public function actionCreateimg($id)
    {
        $model = new Imagen();
        $model->scenario = 'file';

        if ($model->load(Yii::$app->request->post())) {
            $doc = UploadedFile::getInstance($model, 'file');
            $docName = Yii::$app->security->generateRandomString() . time() . '.' . $doc->extension;
            // $docName =  'mauricio.' . $doc->extension;
            $doc->saveAs(\Yii::$app->params['foroImgs'] . $docName);
            $model->file = $docName;
            $model->save();

            //Guarda relación de documentos
            $modelPhforumImg = new PhforumImagen;
            $modelPhforumImg->phforum_id = $id;
            $modelPhforumImg->imagen_id = $model->id;
            $modelPhforumImg->save();

            \Yii::$app->getSession()->setFlash('success', 'La imagen ha sido registrada éxitosamente');

            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('createimg', [
                'model' => $model,
                'id' => $id,
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
            \Yii::$app->getSession()->setFlash('success', 'La información del Foro ha sido actualizada éxitosamente');
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

    protected function sendMail($id, $message, $url, $title)
    {

        $content = $message;
        // Carga de datos de topicos
        $modelTopic = Topic::find()->where(['phforum_id' => $id])->all();
        // Todos los temas
        foreach ($modelTopic as $topic):
            // Todos los usuarios del tema agrupados por usuarios
            foreach (\app\models\Post::find()->where(['topic_id' => $topic->id])->addGroupBy(['user_id'])->all() as $post):
                if ($post->user->notification == User::EMAIL_DAILY)
                    $post->user->sendEmail($content, $url, $title);

            endforeach;
        endforeach;
    }
}
