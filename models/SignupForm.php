<?php
namespace app\models;

use app\models\User;
use app\models\Profile;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
//    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Este nómbre de usuario ya ha sido seleccionado.'],
            ['username', 'string', 'min' => 6, 'max' => 15],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],

            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'El correo electrónico ya esta registrado en el sistema.'],
//            ['captcha', 'required'],
//            ['captcha', 'captcha'],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],
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
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                $auth = Yii::$app->authManager;
                $authorRole = $auth->getRole('user');
                $auth->assign($authorRole, $user->getId());
                return $user;
            }
        }

        return null;
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Nombre de Usuario',
            'password' => 'Contraseña',
/*            'email' => 'Correo Electrónico',
            'status' => 'Estado',
            'created_at' => 'Fecha de Creación',
            'updated_at' => 'Fecha de Actualización',*/
        ];
    }
}
