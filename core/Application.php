<?php

namespace  app\core;

/**
 * Class Application
 *
 * @author Imran <imranmailbd@gmail.com>
 * @package namespace app\core;
 */
class Application
{
    public static string $ROOT_DIR;

    public string $layout = 'main';
    public string $userClass;
    public string $buyerClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public ?DbModel $user;
    public ?DbModel $buyer;


    public static Application $app;
    public ?Controller $controller = null;
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        $this->buyerClass = $config['buyerClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request,$this->response);

        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        $primaryValueB = $this->session->get('buyer');
        // echo $primaryValue;exit;
        if($primaryValue){
            // var_dump(new $this->userClass);exit;
            $userCl = new $this->userClass;
            // var_dump($userCl);
            // exit;
            $primaryKey = $userCl->primaryKey();   //app\models\User
            $this->user = $userCl->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
            $primaryValue = null;
        }

        if($primaryValueB){
            // var_dump(new $this->buyerClass);exit;
            $buyerCl = new $this->buyerClass;
            // var_dump($userCl);
            // exit;
            $primaryKeyB = $buyerCl->primaryKey();   //app\models\User
            $this->buyer = $buyerCl->findOne([$primaryKeyB => $primaryValueB]);
        } else {
            $this->buyer = null;
            $primaryValue = null;
        }


    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        try{
            echo $this->router->resolve();
        }catch (\Exception $e){
            echo $this->router->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    /**
     * @return \app\core\Controller
     */
    public function getController(): \app\core\Controller
    {
        return $this->controller;
    }

    /**
     * @return \app\core\Controller $controller
     */
    public function setController(\app\core\Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

}