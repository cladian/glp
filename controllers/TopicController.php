<?php

namespace app\controllers;

use Yii;
use app\models\Topic;
use app\models\Video;
use app\models\Imagen;
use app\models\Post;
use app\models\TopicSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use app\models\TopicDocument;
use app\models\TopicVideo;
use app\models\TopicImagen;
use app\models\Document;
use app\models\PostSearch;

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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
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

        $modelPost = new Post();

        if ($modelPost->load(Yii::$app->request->post()) ) {
            $modelPost->save();
            $modelPost = new Post();
            $modelPost->content=null;
       }
        $modelPost->topic_id=$id;
        $modelPost->user_id=Yii::$app->user->id;

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchPost' => $searchPost,
            'dataProviderPost' => $dataProviderPost,
            'modelPost'=>$modelPost,
            'modelPostList'=>Post::find()->where(['topic_id'=>$id])->all(),

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
        $model->phforum_id= $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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

        if ($model->load(Yii::$app->request->post())) {
            $doc = UploadedFile::getInstance($model, 'file');
            $docName = Yii::$app->security->generateRandomString().time() . '.' . $doc->extension;
            $doc->saveAs(\Yii::$app->params['foroDocs'] . $docName);
            $model->file = $docName;
            $model->save();

                      //Guarda relación de documentos
            $modelTopicDocument=new TopicDocument;
            $modelTopicDocument->topic_id=$id;
            $modelTopicDocument->document_id=$model->id;
            $modelTopicDocument->save();

//            print_r($modelTopicDocument);


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
            $modelTopicVideo=new TopicVideo;
            $modelTopicVideo->topic_id=$id;
            $modelTopicVideo->video_id=$model->id;
            $modelTopicVideo->save();
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
            $modelTopicImg=new TopicImagen;
            $modelTopicImg->topic_id=$id;
            $modelTopicImg->imagen_id=$model->id;
            $modelTopicImg->save();

            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('createimg', [
                'model' => $model,
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


}
