<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.07.2019
 * Time: 12:07
 */
namespace App\Model;


use App\Model\Model;
use Core\Exceptions\ExceptionClass as Ex;
use App\Controllers\Request\RequestClass as Request;

/**
 * Class PhoneModel
 * @package App\Model
 */
class PhoneModel extends Model
{
    private $table = 'phones';

    /**
     * @param string $type
     * @param null $data
     * @return array|int
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
     * @return array
     */
    private function Select($data = null)
    {
        $connect = $this->getDBHConnect();
        $empIds = [];
        $result = [];
        foreach ($data as $value){
            foreach ($value as $k => $v) {
                if ($k == "employer_id") {
                    array_push($empIds, $v);
                }
            }
        }
        $empIds = (array_values(array_unique($empIds)));
        for($i = 0; $i < count($empIds); $i++){
            $query = "SELECT phone_num, emp_id FROM $this->table WHERE phones.emp_id = $empIds[$i]";
            $res = $connect->query($query);
            $result[$i] = $res->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $result;

    }

    /**
     * @param Request $data
     * @return int
     * @throws Ex
     */
    private function Insert(Request $data)
    {
        $connect = $this->getDBHConnect();
        $phone = explode(';',$data->getElement('phone'));
        try {
            $length = count($phone);
            $i = 0;
            while($i < $length) {
                $stmt = $connect->prepare("INSERT INTO $this->table (phones.emp_id, phones.phone_num) 
                                        VALUES ( (SELECT MAX(employee.employer_id) FROM employee), :phone)");
                $stmt->bindParam(':phone', $phone[$i]);
                $i++;
                if (!$stmt->execute())
                    throw new \PDOException("Ошибка вставки PhoneModel!");
            }
        } catch (\PDOException $e){
            print_r("Message: ".$e->getMessage());
        }

        return 1;
    }

    /**
     * @param Request $data
     */
    private function Update(Request $data)
    {}
}