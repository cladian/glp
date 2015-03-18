<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Document;
use app\models\Video;
use app\models\Imagen;
use yii\web\UploadedFile;

use app\models\PostDocument;
use app\models\PostVideo;
use app\models\PostImagen;
/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

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
            $modelPostDocument=new PostDocument;
            $modelPostDocument->post_id=$id;
            $modelPostDocument->document_id=$model->id;
            $modelPostDocument->save();


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
            $modelPostVideo=new PostVideo;
            $modelPostVideo->post_id=$id;
            $modelPostVideo->video_id=$model->id;
            $modelPostVideo->save();
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
            $modelPostImg=new PostImagen;
            $modelPostImg->post_id=$id;
            $modelPostImg->imagen_id=$model->id;
            $modelPostImg->save();

            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('createimg', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
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
     * Deletes an existing Post model.
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
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
