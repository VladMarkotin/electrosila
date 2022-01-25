<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 22.06.2018
 * Time: 12:11
 */
namespace Core;


use Core\router as router;
use Core\DB\DBClass as DB;
use Core\Exceptions\ExceptionClass as Ex;
use Core\Template\TemplateClass as Template;

class CoreClass
{
    private $system_objects = [];

    private static $instance = null;

    /**
     * CoreClass constructor.
     */
    private function __construct(){}

    /**
     *
     */
    private function __clone(){}

    /**
     * @return CoreClass|null
     */
    public static function getInstance(){
        if (!CoreClass::$instance){
            return CoreClass::$instance = new CoreClass();
        }
        else
            return CoreClass::$instance;
    }

    /**
     *
     */
    public function init()
    {
        if (empty($this->system_objects)){
            $this->system_objects["router"] = router\RouterClass::getInstance();
            //$this->system_objects["db"] = DB::getInstance();
            $this->system_objects['template'] = Template::getInstance();
        }

        foreach ($this->system_objects as $obj){
            $obj->init();
        }
    }

    public function getSystemObject($request = "router")
    {
        switch ($request){
            //case "db": return $this->system_objects['db'];
            case "router": return $this->system_objects['router'];
            case "template": return $this->system_objects['template'];
            default: throw new Ex("Can`t find such system object!");
        }
    }
} 