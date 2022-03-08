<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

/**
 *
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $param = [
            'name' => "PHP MVC [Muhammed Imran]"
        ];
        return $this->render('home', $param);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();

        return 'Handling submitted data';
    }
}