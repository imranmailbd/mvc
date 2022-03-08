<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\middlewares\BuyerMiddleware;
use app\models\LoginFormBuyer;
use app\core\Request;
use app\core\Response;
use app\models\Buyer;

/**
 *
 * @package app\controllers
 */
class BuyerController extends Controller
{
    public function __construct()
    {
        //$this->registerMiddleware(new BuyerMiddleware(['buyerprofile']));
    }

    public function login(Request $request, Response $response)
    {
        //Write buyer login code here
    }

    /**
     * @param Request $request
     * @return array|false|string|string[]|void
     * Use for buyer registration form and form data save
     */
    public function buyerRegister(Request $request)
    {
        $buyer = new Buyer();

        if($request->isPost()){
            $buyer->loadData($request->getBody());
            //var_dump($request->getBody());exit;
            if($buyer->validate() && $buyer->save()){
                $res['success'] = "success";
                echo json_encode($res);
                exit;
            } else {
                $res['error'] = "error";
                echo json_encode($res);
            }
        }

        $this->setLayout('authAjax');
        return $this->render('buyer', [
            'model' => $buyer
        ]);
    }


    public function profile()
    {
        return $this->render('profile');
    }

    /**
     * @param Request $request
     * @return array|false|string|string[]|void
     * Use for Buyer list generate and show
     */
    public function buyerShow(Request $request)
    {
        $buyer = new Buyer();

        //Use for filter, it is not enable now
        if($request->isPost()){
            $buyer->loadData($request->getBody());
        }

        $buyerAll = $buyer->findAll(['buyer_email' => 'test@gmail.com']);
        //var_dump($buyerAll);exit;

        $this->setLayout('authAjax');
        $param = [
            'buyers_data' => $buyerAll
        ];
        return $this->render('buyerlist', $param);

    }

}