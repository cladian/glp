<?php
namespace app\models;

use app\models\User;
use app\models\Profile;
use yii\base\Model;
use Yii;
use yii\helpers\Url;

/**
 * Signup form
 */
class RecoverForm extends Model
{

    public $email;
    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],

            ['email', 'email'],
            //['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'El correo electrónico ya esta registrado en el sistema.'],
            ['captcha', 'required'],
            ['captcha', 'captcha'],

        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = User::find()->where(['email'=>$this->email])->one() ;

            if ($user)
            {   $newpassword= rand(1,99999999);
                $user->setPassword($newpassword);
                $user->generateAuthKey();
                $user->save();

                $title="Asocam GLP, reseteo de contraseña";
                // Envio de correo
                $html = '<h4>Recuperación de contraseña </h4>';
                $html .= '<blockquote>
                            <b>Usuario: </b>' . $user->username  . '<br/>
                            <b>Nueva Contraseña:</b>' . $newpassword . '<br/>
                            </blockquote>';
                $html = '<p>Una vez dentro del sistema, recomendamos la actualización de ésta información por una contraseña que usted recuerde.</p>';
                $url = \Yii::$app->params['webRoot'] . Url::to(['site/login']);

                $user->sendEmail ($html, $url,$title);

                \Yii::$app->getSession()
                    ->setFlash('success',
                        'Su contraseña ha sido reseteada éxitosamente, por favor verificar esta información en su correo electrónico.'.$newpassword);

                return $user;
            }
            \Yii::$app->getSession()
                ->setFlash('danger',
                    'No éxiste registro de usuario con la información de correo electrónico proporcionada');
        }
        return null;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Nombre de Usuario',
            'email' => 'Correo Electrónico',

        ];
    }
}
