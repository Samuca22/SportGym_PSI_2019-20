<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            //['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => 'Preencha  o campos'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email já está a ser usado'],

            // Password será atribuida automaticamente
            //['password', 'required'],
            ['password', 'string', 'min' => 4],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();


        $auth = Yii::$app->authManager;
        $socio = $auth->getRole('socio');
        $auth->assign($socio, $user->getId());

        return true;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
//    public function sendEmail()
//    {
//        Yii::$app->mailer->compose()
//        ->setFrom('sportgym.muscle@gmail.com')
//            ->setTo('ricardofm1712@gmail.com')
//            ->setSubject('Teste')
//            ->setHtmlBody('<p>Credenciais de Acesso: </p><p><b>USERNAME: </b>' . $this->username . '</p><p><b>PASSWORD: </b>' . $this->password . '</p>')
//            ->send();
//    }

    public function atribuirUserPass()
    {
        $this->username = Yii::$app->security->generateRandomString(8);
        $this->password = "goncalo";
       // $this->password = Yii::$app->security->generateRandomString(8);
    }
}
