<?php

namespace app\controllers;

use app\models\Inscription;
use app\models\InscriptionSearch;
use app\models\NotificationSearch;
use app\models\Profile;
use app\models\Event;
use app\models\Request;
use app\models\Post;

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
use app\models\RecoverForm;
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
                'only' => ['login', 'logout', 'signup', 'event', 'admuser', 'admasocam', 'forgot'],
                // 'only' => ['login', 'logout', 'signup','event','admuser'],
                'rules' => [
                    [
                        'actions' => ['login', 'signup', 'forgot'],
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
            ->where(['status' => self::STATUS_ACTIVE])
            ->orderBy('begin_at')
//            ->limit(4)
            ->all();



        return $this->render('admUser', [
            'hasProfile' => Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->count(),
            'modelProfile' => Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->one(),
            'modelEvent' => $modelEvent,
            'searchInscription' => $searchInscription,
            'dataInscription' => $dataInscription,
            'searchNotification' => $searchNotification,
            'dataNotification' => $dataNotification,
            'modelRecentInscription'=>Inscription::find()->where(['user_id'=>Yii::$app->user->identity->id])->orderBy('created_at desc')->limit(10)->all(),
            'modellatestPost' => Post::find()->where(['status' => self::STATUS_ACTIVE,'user_id'=>Yii::$app->user->identity->id])->orderBy('created_at desc')->limit(10)->all(),

        ]);
    }



    public function actionAdmasocam()
    {
        $searchModel = new InscriptionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $modelRequest = Request::find()
            ->where(['status' => self::STATUS_ACTIVE])
            ->orderBy('created_at desc')
            ->all();

        return $this->render('admAsocam', [
            'ownInscriptions' => Inscription::find()->where(['user_id' => Yii::$app->user->identity->id])->count(),
            'hasProfile' => Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->count(),
            'activeUsers' => User::find()->where(['status' => self::STATUS_ACTIVE])->count(),
            'activeEvents' => Event::find()->where(['status' => self::STATUS_ACTIVE])->count(),
            'activeInscriptions' => Inscription::find()->where(['status' => self::STATUS_ACTIVE])->count(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelRequest' => $modelRequest,
            'modelRecentInscription'=>Inscription::find()->orderBy('created_at desc')->limit(10)->all(),
        ]);

    }

    /*
     * Modificaciones previas
     */
    public function actionIndex()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                   // return $this->goHome();
                    return $this->redirect(['/foro']);
                }
            }
        }

        if (Yii::$app->user->can('asocam')) {
            return $this->redirect(['admasocam']);
        } elseif (Yii::$app->user->can('user')) {
            return $this->redirect(['admuser']);
        } else {
            return $this->render('index', [
                'modelEvent' => Event::find()->where(['status' => self::STATUS_ACTIVE])->limit(3)->all(),
                'model'=> $model
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
            //return $this->goBack();
            return $this->redirect(['/foro']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


/*    public function actionForgot()
    {*/
        // $getEmail="edison@cladian.com";
        //$getEmail=$_POST['Lupa']['email'];

 /*       if(isset($_POST['Lupa']))
        {   $getEmail=$_POST['Lupa']['email'];
            $getModel= User::model()->findByAttributes(array('email'=>$getEmail));

            if (!is_null($getModel))
            {
                $password=rand(0, 9999999);

                $namaPengirim="Unicef : Lactancia MAterna";
                $emailadmin="team@cladian.com";
                $subjek="Unicef.::. Reseteo de Contraseña";
                $setpesan="
                    <h3>Hemos recibido una solicitud de cambio de contraseña</h3>
                    <p>El sistema ha reseteado su contraseña, utilice estos datos para acceder la próxima vez al sistema.</p>
                    <b>USUARIO: </b> ".$getModel->username."<br/>
                    <b>CONTRASEÑA: </b>".$password." <br/>
                    <h3>Administración Unicef</h3>
                    ";
//                        "Reply-To: {$emailadmin}\r\n".
                $name='=?UTF-8?B?'.base64_encode($namaPengirim).'?=';
                $subject='=?UTF-8?B?'.base64_encode($subjek).'?=';
                $headers="From: $name <{$getModel->email}>\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-type: text/html; charset=UTF-8";

                // Actualización de password
                $command = Yii::app()->db->createCommand();
                $command->update('user', array(
                    'password'=>md5($password),
                ), 'id=:id', array(':id'=>$getModel->id));


                // $getModel->save();
                Yii::app()->user->setFlash('forgot','Hemos remitido la información Actualización completa');
                mail($getEmail,$subject,$setpesan,$headers);
                //$this->refresh();
                $this->redirect(array('site/login'));
            }
            else{
                Yii::app()->user->setFlash('forgot','El correo proporcionado no esta registrado en el sistema');
                $this->redirect(array('site/login'));
            }

        }*/
       // $this->render('forgot');
        // }



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

//                    return $this->goHome();
                    return $this->redirect(['foro/index']);

                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionForgot()
    {
        $model = new RecoverForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {


                    return $this->goHome();


            }
        }

        return $this->render('forgot', [
            'model' => $model,
        ]);
    }



}
