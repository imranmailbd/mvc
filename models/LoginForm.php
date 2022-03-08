<?php

namespace app\models;

use app\core\Application;
use app\core\Model;
use app\models\User;

class LoginForm extends Model
{

    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your email',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $userCl = new User;
            // var_dump($userCl);
            // exit;
            $primaryKey = $userCl->primaryKey();   //app\models\User
            // echo $primaryKey;exit;
            // $this->user = $userCl->findOne([$primaryKey => $primaryValue]);
            // $this->user = $userCl->findOne(['email' => $this->email]);
        $user = $userCl->findOne(['email' => $this->email]);
        if(!$user){
            $this->addError('email', 'User does not exist with this email');
            return false;
        }
        if(!password_verify($this->password, $user->password)){
            $this->addError('password', 'Password is incorrect');
            return false;
        }

//        echo '<pre>';
//        var_dump($user);
//        echo '</pre>';
//        exit;

        return Application::$app->login($user);
    }



}