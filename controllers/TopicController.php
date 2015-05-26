<?php

namespace app\controllers;

use Yii;
use app\models\Topic;
use app\models\User;
use app\models\Video;
use app\models\Imagen;
use app\models\Post;
use app\models\TopicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\models\TopicDocument;
use app\models\TopicVideo;
use app\models\TopicImagen;
use app\models\Document;
use app\models\PostSearch;
use app\models\TopicDocumentSearch;
use app\models\TopicImagenSearch;
use app\models\TopicVideoSearch;
use yii\helpers\Url;

/**
 * TopicController implements the CRUD actions for Topic model.
 */
class TopicController extends Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'createdoc', 'createvideo', 'createimg','update','delete'],
                // 'only' => ['login', 'logout', 'signup','event','admuser'],
                'rules' => [
                    [
                        'actions' => ['index','view','create','createvideo','createimg','update','delete'],
                        'allow' => true,
                        'roles' => ['asocam','sysadmin'],
                    ],

                    [
                        'actions' => ['createdoc'],
                        'allow' => true,
                        'roles' => ['user','asocam','sysadmin'],
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
     * Lists all Topic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TopicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Topic model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $searchPost = new PostSearch();
        $dataProviderPost = $searchPost->searchByTopic(Yii::$app->request->queryParams, $id);

        $searchTopicDocument = new TopicDocumentSearch();
        $dataProviderPostDocument = $searchTopicDocument->searchByTopic(Yii::$app->request->queryParams, $id);

        $searchTopicImagen = new TopicImagenSearch();
        $dataProviderTopicImagen = $searchTopicImagen->searchByTopic(Yii::$app->request->queryParams, $id);

        $searchTopicVideo = new TopicVideoSearch();
        $dataProviderTopicVideo = $searchTopicVideo->searchByTopic(Yii::$app->request->queryParams, $id);

        $modelPost = new Post();
        $modelPost->topic_id = $id;
        $modelPost->user_id = Yii::$app->user->id;
        if ($modelPost->load(Yii::$app->request->post())) {
            $modelPost->save();
            $modelPost = new Post();
            $modelPost->content = null;
        }


        return $this->render('view', [
            'model' => $this->findModel($id),

            'searchPost' => $searchPost,
            'dataProviderPost' => $dataProviderPost,

            'searchTopicDocument' => $searchTopicDocument,
            'dataProviderPostDocument' => $dataProviderPostDocument,

            'searchTopicImagen' => $searchTopicImagen,
            'dataProviderTopicImagen' => $dataProviderTopicImagen,

            'searchTopicVideo' => $searchTopicVideo,
            'dataProviderTopicVideo' => $dataProviderTopicVideo,

            'modelPost' => $modelPost,
            'modelPostList' => Post::find()->where(['topic_id' => $id])->all(),

        ]);
    }

    /**
     * Creates a new Topic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Topic();
        $model->user_id = Yii::$app->user->id;
        $model->phforum_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', 'El nuevo tema ha sido agregado éxitosamente');
            return $this->redirect(['phforum/view', 'id' => $model->phforum_id]);
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
        $modelTopic=$this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $doc = UploadedFile::getInstance($model, 'file');
            $docName = Yii::$app->security->generateRandomString() . time() . '.' . $doc->extension;
            $doc->saveAs(\Yii::$app->params['foroDocs'] . $docName);
            $model->file = $docName;
            $model->save();

            //Guarda relación de documentos
            $modelTopicDocument = new TopicDocument;
            $modelTopicDocument->topic_id = $id;
            $modelTopicDocument->document_id = $model->id;
            $modelTopicDocument->save();


            \Yii::$app->getSession()->setFlash('success', 'El documento ha sido registrado éxitosamente');
            // Envio de notificación
            // http://localhost/glp/web/upload/docs/XyMVjkPLyyJGrxnTegyVynwFqEQvx2s21429652374.pdf
            if ($modelTopic->status == Topic::STATUS_ACTIVE){
                $title = 'Nuevo documento Agregado';
                $html = '<p>Estimado participante el moderador del foro ha publicado un nuevo documento, puede revisar la información en el enlace a continuación</p>';
                $html .= '<p> Documento: ' . $model->name . '</p>';
                $html .= '<kbd>' . Yii::$app->user->identity->username . '</kbd>';
                $url = \Yii::$app->params['webRoot'] . Url::to(['foro/topic','id'=>$id]);
                $this->sendMailResources($id, $html, $url, $title);
            }
            else
            {
                \Yii::$app->getSession()->setFlash('warning', 'La notificación electrónica no ha sido enviada ya que el Tema no tiene un estado ACTIVO');
            }


            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('createdoc', [
                'model' => $model,
                'id' => $id,
            ]);
        }
    }

    public function actionCreatevideo($id)
    {
        $model = new Video();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //Guarda relación de documentos
            $modelTopicVideo = new TopicVideo;
            $modelTopicVideo->topic_id = $id;
            $modelTopicVideo->video_id = $model->id;
            $modelTopicVideo->save();
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
            $modelTopicImg = new TopicImagen;
            $modelTopicImg->topic_id = $id;
            $modelTopicImg->imagen_id = $model->id;
            $modelTopicImg->save();
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
     * Updates an existing Topic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', 'La información del tema ha sido actualizada éxitosamente');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Topic model.
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
     * Finds the Topic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Topic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Topic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function sendMailResources($id, $message, $url, $title)
    {

        $content = $message;
        // Versión 26 de Mayo 2015
        foreach (\app\models\User::find()->where(['status'=>User::STATUS_ACTIVE])->all() as $post):
            if ($post->notification == User::EMAIL_DAILY)
                $post->sendEmail($content, $url, $title);

        endforeach;


   /*     // Todos los temas
        //foreach ($modelTopic as $topic):
        // Todos los usuarios del tema agrupados por usuarios
        foreach (\app\models\Post::find()->where(['topic_id' => $id])->addGroupBy(['user_id'])->all() as $post):
            if ($post->user->notification == User::EMAIL_DAILY)
                $post->user->sendEmail($content, $url, $title);

        endforeach;
        //endforeach;*/
    }

}
