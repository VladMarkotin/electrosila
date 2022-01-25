<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:05
 */
namespace Core\Template;


use Core\AbstractCore as AC;
use Core\Exceptions\ExceptionClass as Ex;

class TemplateClass extends AC
{
    private static $template = null;

    private $loader = null;

    private $twig = null;

    /**
     * TemplateClass constructor.
     */
    private function __construct(){}

    /**
     *
     */
    private function __clone(){}

    /**
     * @return TemplateClass|null
     */
    public static function getInstance()
    {
        if (!self::$template){
            return new TemplateClass();
        }
        else{
            return self::$template;
        }
    }

    /**
     *
     */
    public function init()
    {
        $this->loader = new \Twig_Loader_Filesystem('app/views/templates');
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => 'app/views/cache',
            'auto_reload' => true
        ));
    }

    /**
     * @return null
     * @throws Ex
     */
    public function getTwig()
    {
        if ($this->twig)
            return $this->twig;
        else throw new Ex("Error with template");
    }

} 