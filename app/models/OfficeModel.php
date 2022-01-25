<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.07.2019
 * Time: 17:34
 */
namespace App\Model;


use App\Controllers\Request\RequestClass as Request;

/**
 * Class OfficeModel
 * @package App\Model
 */
class OfficeModel extends Model
{
    private $table = 'offices';

    /**
     * @param string $type
     * @param null $data
     * @return int
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
        $query = "SELECT office_id FROM ". $this->table;
        $result = $connect->query($query);
        $result = $result->fetchAll(\PDO::FETCH_ASSOC);

        return $result;

    }

    /**
     * @param Request $data
     * @return mixed
     * @throws \Core\Exceptions\ExceptionClass
     */
    private function Insert(Request $data)
    {
        $connect = $this->getDBHConnect();
        $fio = $data->getElement('fio');
        $info = explode(" ", $fio);
        $fname = $info[0];
        $lname = $info[1];
        $sname = $info[2];
        try
        {
            $stmt = $connect->prepare(" INSERT INTO visitors_log
                 (fname, lname, secondname, comment) VALUES (:fname, :lname, :secondname, :comment)" );
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':secondname', $sname);
            $stmt->bindParam(':comment', $data->getElement('comment'));
            if(! $stmt->execute() ) {
                throw new \PDOException("Ошибка вставки!");
            }
        } catch (\PDOException $e){
            print_r("Message: ".$e->getMessage());
        }

        return $fname;
    }

    /**
     * @param Request $data
     */
    private function Update(Request $data)
    {}
}