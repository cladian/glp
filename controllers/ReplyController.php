<?php

namespace app\controllers;

use app\models\Request;
use Yii;
use app\models\Reply;
use app\models\ReplySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Html;

/**
 * ReplyController implements the CRUD actions for Reply model.
 */
class ReplyController extends Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                // 'only' => ['login', 'logout', 'signup','event','admuser'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['sysadmin'],
                    ],
                    [
                        'actions' => ['create', 'index', 'view'],
                        'allow' => true,
                        'roles' => ['asocam', 'user'],
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
     * Lists all Reply models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reply model.
     * @param integer $user_id
     * @param integer $request_id
     * @return mixed
     */
    public function actionView($user_id, $request_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id, $request_id),
        ]);
    }

    /**
     * Creates a new Reply model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // Pasa como parametro el id de la Solicitud
    public function actionCreate($id)
    {
        $model = new Reply();
        $model->request_id = $id;
        $model->user_id = \Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'user_id' => $model->user_id, 'request_id' => $model->request_id]);

            $this->sendMail($model->request_id,$model->text, Html::a('Registrarme', ['reply/create/','id'=>$model->request_id], ['class' => 'btn btn-lg btn-primary']) );

            return $this->redirect(['create', 'id' => $id]);

        } else {
            return $this->render('create', [
                'model' => $model,
                'modelReply' => Reply::find()->where(['request_id' => $id])->orderBy('created_at desc')->all(),
            ]);
        }
    }

    /**
     * Updates an existing Reply model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $user_id
     * @param integer $request_id
     * @return mixed
     */
    public function actionUpdate($user_id, $request_id)
    {
        $model = $this->findModel($user_id, $request_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id, 'request_id' => $model->request_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reply model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $user_id
     * @param integer $request_id
     * @return mixed
     */
    public function actionDelete($user_id, $request_id)
    {
        $this->findModel($user_id, $request_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reply model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $user_id
     * @param integer $request_id
     * @return Reply the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id, $request_id)
    {
        if (($model = Reply::findOne(['user_id' => $user_id, 'request_id' => $request_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    protected function sendMail($request_id, $message,$url)
    {   $content="<h1>Respuesta a solicitud</h1>";
        $content.="El usuario respondio a su inquitud";
        $content.="<p>".$message."</p>";


        $modelReply=Reply::find()->where(['request_id'=>$request_id])->addGroupBy(['user_id'])->all();
        foreach ($modelReply as $reply){
            $reply->user->sendEmail($content, 1,$url);


        }


    }
}
