<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 20.05.2018
 * Time: 8:00
 */
namespace Core\Exceptions;


use Core\CoreClass;

/**
 * Class Error404
 * @package Core\Exceptions
 */
class Error404
{
    /**
     * Error404 constructor.
     * @param $view
     */
    public function __construct($view)
    {
        $core = CoreClass::getInstance();
        $core->init();
        $template = $core->getSystemObject("template");
        $twig = $template->getTwig();
        echo $twig->render($view);
    }

    public function Error()
    {}
}