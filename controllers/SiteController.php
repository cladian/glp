<?php

namespace app\controllers;

use app\models\Inscription;
use app\models\InscriptionSearch;
use app\models\Profile;
use app\models\Event;
use app\models\EventSearch;
use app\models\User;
use Yii;

// Comentado Temporalmente
//use yii\base\Event;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use yii\web\NotFoundHttpException;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionAdmuser()
    {
        // De acceso solo para usuarios logeados

        // Verificamos si el usuario tiene registro de perfil
        // $hasProfile= Profile::find()->where(['user_id'=>Yii::$app->user->identity->id])->count();

       // $searchInscription=Inscription::find()->where(['status'=>10])->all();
        $searchInscription=new InscriptionSearch();
        $dataInscription = $searchInscription->search(Yii::$app->request->queryParams);


        return $this->render('admuser', [
            'hasProfile' => Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->count(),
            'searchInscription' => $searchInscription,
            'dataInscription' => $dataInscription,
        ]);
    }

    public function actionAdmasocam()
    {
        $searchModel = new InscriptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admasocam', [
            'hasProfile' => Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->count(),
            'activeUsers' => User::find()->where(['status' => 10])->count(),
            'activeEvents' => Event::find()->where(['status' => 10])->count(),
            'activeInscriptions' => Inscription::find()->where(['status' => 10])->count(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    /*
     * Modificaciones previas
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('user')) {
            return $this->redirect(['admuser']);
        } else if (Yii::$app->user->can('asocam')) {
            return $this->redirect(['admasocam']);
        } else {
            return $this->render('index', [
                'modelEvent' => Event::find()->where(['status' => 10])->all(),
            ]);
        }
    }

    public function actionEvent($id){
        if (($modelEvent = Event::findOne($id)) !== null) {

            return $this->render('event',[
                'modelEvent' => $modelEvent,

            ]);
        }
    else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}
