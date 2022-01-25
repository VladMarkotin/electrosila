<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 19.05.2018
 * Time: 7:58
 */
namespace web_routes;


use exceptions\ExceptionClass as Ex;

/**
 * Class web_routes
 * @package web_routes
 */
class web_routes
{
    /**
     * @var array
     */
    private static $routes = [
        '' => array(
            'route' => '/',
            'file' => 'app/controllers/indexController.php',
            'class' => 'App\Controllers\indexController',
            'function' => '__construct',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => 'index.html',
        ),
        "404" => array (
            'route' => '/',
            'file' => 'core/exceptions/error404.php',
            'class' => 'Core\Exceptions\Error404',
            'function' => 'Error',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => '404.html',
        ),
        "test" => array(
            'route' => '/test',
            'file' => 'app/controllers/testController.php',
            'class' => 'App\Controllers\testController',
            'function' => '__construct',
            'method' => 'get',
            'middleware' => 'anyone',
            'view' => 'test.html',
        ),
        "add" => array(
            'route' => 'add',
            'file' => 'app/controllers/addController.php',
            'class' => 'App\Controllers\addController',
            'function' => 'getPostData',
            'method' => 'post',
            'middleware' => 'anyone',
        ),
    ];

    public static function FindRoute($route){
        try {
            foreach (self::$routes as $k => $v){
                if ($k == $route[1]){
                    return $v;
                }
            }
        } catch (Ex $e){
            throw new Ex("Указанный путь не найден!");
        }

        return 0;
    }
} 