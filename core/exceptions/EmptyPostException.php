<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 29.05.2018
 * Time: 14:13
 */
namespace Exceptions;


/**
 * Class EmptyPostException
 * @package Exceptions
 */
class EmptyPostException extends \Exception
{
    /**
     * EmptyPostException constructor.
     * @param null $with
     */
    public function __construct($with = null)
    {
        header("Location:/");
    }
}


