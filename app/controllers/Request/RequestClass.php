<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 29.05.2018
 * Time: 12:59
 */
namespace App\Controllers\Request;


use Core\Exceptions\ExceptionClass as Ex;

/**
 * Class RequestClass
 * @package App\Controllers\Request
 */
class RequestClass
{

    private $data = [];

    /**
     * @param array $arr
     */
    public function setData(array $arr)
    {
        foreach ($arr as $k => $v){
            $this->data[$k] = $v;
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $in
     * @return mixed
     * @throws Ex
     */
    public function getElement($in)
    {
        if (isset($this->data[$in]) )
            return $this->data[$in];
        throw new Ex("Такой элемент не передавался через POST $in");
    }

    /**
     * @return array
     */
    public function getDataAsArray()
    {
        if (is_array($this->data) || is_object($this->data)) {
            $result = (array) $this;

            return $result;
        }

        return $this->data;
    }

} 