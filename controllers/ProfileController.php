<?php

namespace app\controllers;

use Yii;
use app\models\Profile;
use app\models\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\UploadForm;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

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
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionViewown()
    {
        // Verificación inicial del perfil, si el registro no esta creado se redirije automaticamente
        // a la función create

        if (!Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->count())
            return $this->redirect(['createown']);

        return $this->render('viewown', [
            'model' => $this->findModelown(Yii::$app->user->identity->id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profile();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionCreateown()
    {
        $model = new Profile();

        // Verificamos si el usuario tiene registro de perfil para actualizar
        if (Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->count())
            return $this->redirect(['updateown']);

        if ($model->load(Yii::$app->request->post())) {
            // Asignación del ID de usuario previo al almacenamiento
            // Almacenamiento del modelo;
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['viewown']);
        } else {
            return $this->render('createown', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Profile model.
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
                'file' => $model->id,
            ]);
        }
    }
    public function actionAvatarown()
    {
        $model = $this->findModelown(Yii::$app->user->identity->id);
        //$model = $this->findModel($id);
        $model->scenario = 'avatar';

        if ($model->load(Yii::$app->request->post())) {
            $avatar = UploadedFile::getInstance($model, 'photo');
            $photoName = $model->id . '.' . $avatar->extension;
            $avatar->saveAs(\Yii::$app->params['avatarFolder'] . $photoName);
            $model->photo = $photoName;
            $model->save();
            return $this->redirect(['viewown']);
        } else {
            return $this->render('avatar', [
                'model' => $model,
                'file' => $model->id,
            ]);
        }
    }


    public function actionUpdateown()
    {
        $model = $this->findModelown(Yii::$app->user->identity->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewown']);
        } else {
            return $this->render('updateown', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Profile model.
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
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /*
     * Busqueda de registroo de perfil según usuario logeado
     */
    protected function findModelown($id)
    {
        if (($model = Profile::findOne(['user_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
