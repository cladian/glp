<?php

namespace app\controllers;

use app\models\Inscription;
use app\models\InscriptionSearch;
use app\models\NotificationSearch;
use app\models\Profile;
use app\models\Event;
use app\models\Request;

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
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup', 'event', 'admuser', 'admasocam'],
                // 'only' => ['login', 'logout', 'signup','event','admuser'],
                'rules' => [
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['event'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['admuser'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                    [
                        'actions' => ['admasocam'],
                        'allow' => true,
                        'roles' => ['asocam'],
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
        if (Yii::$app->user->can('user')) {

        }
        $searchInscription = new InscriptionSearch();
        $dataInscription = $searchInscription->searchown(Yii::$app->request->queryParams);

        $searchNotification = new NotificationSearch();
        $dataNotification = $searchNotification->search(Yii::$app->request->queryParams);

        // Por implementar consulta de inscipciones ya habilitadas
        $modelEvent = Event::find()
            ->where(['status' => 10])
            ->orderBy('begin_at')
            ->limit(4)
            ->all();


        return $this->render('admUser', [
            'hasProfile' => Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->count(),
            'modelEvent' => $modelEvent,
            'searchInscription' => $searchInscription,
            'dataInscription' => $dataInscription,
            'searchNotification' => $searchNotification,
            'dataNotification' => $dataNotification,
        ]);
    }

    public function actionAdmasocam()
    {
        $searchModel = new InscriptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $modelRequest = Request::find()->where(['status' => self::STATUS_ACTIVE])->all();

        return $this->render('admAsocam', [
            'ownInscriptions' => Inscription::find()->where(['user_id' => Yii::$app->user->identity->id])->count(),
            'hasProfile' => Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->count(),
            'activeUsers' => User::find()->where(['status' => 10])->count(),
            'activeEvents' => Event::find()->where(['status' => 10])->count(),
            'activeInscriptions' => Inscription::find()->where(['status' => 10])->count(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelRequest' => $modelRequest
        ]);

    }

    /*
     * Modificaciones previas
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('asocam')) {
            return $this->redirect(['admasocam']);
        } elseif (Yii::$app->user->can('user')) {
            return $this->redirect(['admuser']);
        } else {
            return $this->render('index', [
                'modelEvent' => Event::find()->where(['status' => 10])->all(),
            ]);
        }
    }

    public function actionEvent($id)
    {
        if (($modelEvent = Event::findOne($id)) !== null) {

            return $this->render('event', [
                'modelEvent' => $modelEvent,

            ]);
        } else {
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
