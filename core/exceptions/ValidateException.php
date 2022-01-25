<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.07.2019
 * Time: 19:11
 */
namespace Core\Exceptions;

/**
 * Class ValidateException
 * @package Exceptions
 */
class ValidateException extends \Exception
{
    /**
     * ValidateException constructor.
     * @param null $message
     */
    public function __construct($message = null)
    {
        die($message);
    }
}