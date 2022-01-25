<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 22.06.2018
 * Time: 12:14
 */
namespace Core\exceptions;

/**
 * Class ExceptionClass
 * @package Exceptions
 */
class ExceptionClass extends \Exception
{
    /**
     * ExceptionClass constructor.
     * @param null $with
     */
    public function __construct($with = null)
    {
        die("Error has happend: ".$with);
    }
} 