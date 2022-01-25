<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 03.01.2019
 * Time: 12:49
 */
namespace App\Controllers;


use core\CoreClass as Core;

class testController extends Controller
{
    public function __construct($view = null)
    {
        parent::__construct($view);
        if($view){
            $twig = $this->template->getTwig();
            echo $twig->render($view);
        }
    }
} 