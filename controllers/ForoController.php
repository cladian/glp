<?php

namespace app\controllers;

use Yii;
use app\models\Phforum;
use app\models\Topic;
use app\models\PhforumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Post;
use yii\helpers\Url;

/**
 * PhforumController implements the CRUD actions for Phforum model.
 */
class ForoController extends Controller
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
        return $this->render('index', [
            'model'=>Phforum::find()->where(['status'=>self::STATUS_ACTIVE])->all(),
        ]);
    }

    public function actionTopic($id)
    {

        $modelPost = new Post();
        $modelPost->topic_id=$id;
        $modelPost->user_id=Yii::$app->user->id;

        if ($modelPost->load(Yii::$app->request->post()) && $modelPost->validate() ) {
            $modelPost->save();

            // > Envio de correo electrónico
            $html='<h4>Contenido </h4>';
            $html.='<blockquote>'.$modelPost->content.'</blockquote>';
            $html.='<kbd>'.$modelPost->user->username.'</kbd>';
            $url= \Yii::$app->params['webRoot'].Url::to(['foro/topic', 'id' => $id,'#' => $modelPost->id]);

            $this->sendMail($id,$html, $url );
            //> Fin Correo
            \Yii::$app->getSession()
                ->setFlash('success',
                    'Su aporte ha sido publicado éxitosamente');



            // Encerar modelo
            return $this->redirect(['topic', 'id' => $id]);
         /*   $modelPost = new Post();
            $modelPost->content=NULL;*/

        }

        return $this->render('topic', [
            'model'=>Topic::find()->where(['id'=>$id])->one(),
            'modelPostList'=>Post::find()->where(['topic_id'=>$id])->all(),
            'modelPost'=>$modelPost,
        ]);
    }

    /**
     * Displays a single Phforum model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelPostList'=>Post::find()->where(['topic_id'=>$id])->all(),
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




    public function actionList()
    {
        return $this->render('list');
    }

    public function actionMultimedia()
    {
        return $this->render('multimedia');
    }
    public function actionMensajes()
    {
        return $this->render('mensajes');
    }
    public function actionTopicfinal()
    {
        return $this->render('topicFinal');
    }

    /*
* Función para envio de correos electrónicos a todos los participantes que están participando en el tópico
*/
    protected function sendMail($topic_id, $message, $url)
    {
        $title="Nuevo mensaje enviado Foro-ASOCAM";
        $content=$message;

        $modelPost=Post::find()->where(['topic_id'=>$topic_id])->addGroupBy(['user_id'])->all();
        foreach ($modelPost as $user){
            // Contenido, tipo  1=Notificacion URL
            $user->user->sendEmail($content, $url, $title);
        }


    }

}
