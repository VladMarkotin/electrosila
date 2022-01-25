<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 20.05.2018
 * Time: 8:10
 */
namespace App\Controllers;


use App\Model\PhoneModel;
use App\Model\OfficeModel;
use App\Model\EmployeeModel;

/**
 * Class indexController
 * @package App\Controllers
 */
class indexController extends Controller
{
    /**
     * indexController constructor.
     * @param null $view
     */
    public function __construct($view = null)
    {
        parent::__construct($view);
        /* При наличии шаблона для страницы
         * рендерим его с помощью шаблонизатора Twig. Предварительно
         * получаем объеки-ядро приложения, который и обеспечивает доступ к шаблонизатору
         */
        if($view){

            $twig = $this->template->getTwig();
            echo $twig->render($view);
        }
    }
} 