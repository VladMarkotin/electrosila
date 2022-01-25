<?php
namespace App\Model;

use App\Model\Model;
use Core\DB\init_file;

//require_once 'core/db/init_file.php';

class UserModel extends Model
{
     public function getData()
     {
         $init = new init_file();

         return $init->getUsers();
     }
}