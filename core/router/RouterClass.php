<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 07.05.2018
 * Time: 12:49
 */
namespace Core\router;


require_once 'core/router/web_routes/web_routes.php';
use App\Controllers\Request\RequestClass;
use Core\AbstractCore as AC;
use Core\CoreClass;
use web_routes\web_routes;
use Core\Exceptions\ExceptionClass as Ex;

/**
 * Class RouterClass
 * @package router
 */
class RouterClass extends AC
{
    private static $instance = null;

    private $path = null;

    private $file_info = null;

    private function __construct(){}

    private function __clone(){}

    /**
     * @param $param
     * @throws Ex
     */
    private function IsViewExist($param)
    {
        $param['view'] = AC::PATH_TO_TEMPLATES.$param['view'];
        if (!file_exists($param['view'])){
            throw new Ex("Файл представлений не найден!");
        }
    }

    /**
     * @param $param
     */
    private function CheckFile($param)
    {
        if (!file_exists($param['file'])){
            header("Location: 404");
        }
        require_once $param['file'];
    }

    /**
     * @param $param
     * @return mixed
     * @throws Ex
     */
    private function CheckClass($param)
    {
        if (!class_exists($param['class']) ){
            echo $param['class'];
            throw new Ex($param['class']." does not exist");
        }
        if (!$param['view'])
            return new $param['class']();

        return new $param['class']($param['view']);
    }

    /**
     * @param $object
     * @param $method
     * @param null $params
     * @param null $redirect
     * @throws Ex
     */
    private function CheckMethod($object, $method, $params = null, $redirect = null )
    {
        if (!method_exists($object, $method)){
            throw new Ex("with method: $method");
        }
        $object->$method($params, $redirect);
    }

    /**
     * @param $param
     * @throws Ex
     */
    private function CheckSession($param)
    {
        $session = CoreClass::getInstance();
        $session = $session->getSystemObject();
        if ($param["middleware"] == "user"){
            $session->CheckSession();
        }
        elseif( $param["middleware"] == "guest" ){
            $session->DeleteSession();
        }
    }

    /**
     * @param $param
     * @throws Ex
     */
    private function ChecMethodOfSendingData($param)
    {
        if( $param['method'] == "get" ){
            $this->IsViewExist($this->file_info);
            $obj = $this->CheckClass($this->file_info);
            $this->CheckMethod($obj, $this->file_info["function"]);
        }
        else if($param['method'] == "post" ){
            if ($_POST){
                $obj = $this->CheckClass($this->file_info);
                $request = new RequestClass();
                $request->setData($_POST);
                $this->CheckMethod($obj, $this->file_info["function"], $request, $param['redirect']);
            }
            else throw new Ex('Пустой POST массив!');
        }
        else throw new Ex("Непонятный метод передачи данных!");
    }

    /**
     * @return null|RouterClass
     */
    public static function getInstance()
    {
        if ( !self::$instance ){
            return new RouterClass();
        }
        else return self::$instance;
    }

    /**
     *
     */
    public function init()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $this->path = $routes;
    }

    /**
     * @throws Ex
     */
    public function FindPath()
    {
        $this->file_info = web_routes::FindRoute($this->path);
        $this->CheckFile($this->file_info);
        $this->CheckSession($this->file_info);
        $this->ChecMethodOfSendingData($this->file_info);
    }
} 