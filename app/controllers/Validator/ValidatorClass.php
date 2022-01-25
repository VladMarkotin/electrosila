<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 05.01.2019
 * Time: 6:08
 */
namespace App\Controllers\Validator;


use Core\Exceptions\ValidateException as Ex;

/**
 * Class ValidatorClass
 * @package App\Controllers\Validator
 */
class ValidatorClass
{
    private $codes = ["(25)", "(29)", "(33)", "(44)"];

    /**
     * @param array $data
     * @return int
     * @throws Ex
     */
    public function validate(array $data)
    {
        $results = [];
        foreach ( $data as $i => $v ){
            switch( $i ){
                case "email":
                    array_push($results, $this->checkEmail($v));
                    break;
                case "phone":
                    array_push($results, $this->checkPhone($v));
                    break;
            }
        }
        //die(var_dump($results));
        return $this->getSummary($results);
    }

    /**
     * @param $email
     * @return int[]
     */
    private function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ["email" => 1];
        }

        return ["email" => 0];
    }

    /**
     * @param $phone
     * @return int[]
     */
    private function checkPhone($phone)
    {
        foreach ($this->codes as $code){
            if(strripos($phone, $code)){
                return ["phone" => 1];
            }
        }

        return ["phone" => 0];
    }

    private function checkPass($pass, $original)
    {
        return ($pass === $original) ? true: false;
    }

    /**
     * @param $results
     * @return int
     */
    private function getSummary($results)
    {
        foreach ($results as $k => $v){
            if (!$v) {
                $error = "$k is incorrect!";
                return $error;
            }
        }
        
        return true;
    }
} 