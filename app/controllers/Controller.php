<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.07.2019
 * Time: 11:26
 */
namespace App\Controllers;


use Core\CoreClass;

/**
 * Class Controller
 * @package App\Controllers
 */
class Controller
{
    protected $core = null;

    protected $template = null;

    /**
     * Controller constructor.
     * @param null $view
     */
    public function __construct($view = null)
    {
        $this->core = CoreClass::getInstance();
        $this->core->init();
        if($view){
            $this->template = $this->core->getSystemObject("template");
        }
    }
}