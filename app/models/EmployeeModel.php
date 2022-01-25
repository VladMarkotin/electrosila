<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 27.04.2019
 * Time: 6:00
 */
namespace App\Model;


use Core\Exceptions\ExceptionClass as Ex;
use App\Controllers\Request\RequestClass as Request;
use App\Model\PhoneModel as Phone;

/**
 * Class EmployeeModel
 * @package App\Model
 */
class EmployeeModel extends Model
{
    private $table = 'employee';

    /**
     * @param string $type
     * @param null $data
     * @return array|int|mixed|void
     */
    public function exec($type = "select", $data = null)
    {
        switch ($type){
            case "select": return $this->Select($data);
                break;
            case "insert": return $this->Insert($data);
                break;
            case "update":return $this->Update($data);
                break;
        }

        return 0;
    }

    /**
     * @return null
     */
    protected  function getDBHConnect()
    {
        return $this->getConnect();
    }

    /**
     * @param null $data
     * @return mixed
     */
    private function Select($data = null)
    {
        $connect = $this->getDBHConnect();
        $joinTable = "offices";
        $query = "SELECT * FROM ". $this->table. " JOIN $joinTable  ON "."employee.office_id = ".
            "offices.office_id ";
        $result = $connect->query($query);
        $result = $result->fetchAll();
        
        return $result;

    }

    /**
     * @param Request $data
     * @return array
     * @throws Ex
     */
    private function Insert(Request $data)
    {
        $connect = $this->getDBHConnect();
        $office_id = $data->getElement('office_num');
        $email = $data->getElement('email');
        $fio = $data->getElement('fio');
        $info = explode(" ", $fio);
        $fname = $info[0];
        $lname = $info[1];
        $sname = $info[2];
        try {
            $stmt = $connect->prepare(" INSERT INTO employee
                 (office_id, email, fname, lname, sname) VALUES (:office_id, :email, :fname, :lname, :sname)" );
            $stmt->bindParam(':office_id', $office_id);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':sname', $sname);
            if(!$stmt->execute()) {
                throw new \PDOException("Ошибка вставки!");
            }
            $phoneModel = new Phone();
            $phoneModel->exec("insert", $data);

        } catch (\PDOException $e){
            print_r("Message: ".$e->getMessage());
        }
        $resultData = ["office_id" => $office_id, "email" => $email];

        return $resultData;
    }

    /**
     * @param Request $data
     */
    private function Update(Request $data)
    {}
} 