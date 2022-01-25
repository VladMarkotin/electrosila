<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 25.06.2018
 * Time: 8:32
 */
namespace App\Controllers;


use App\Controllers\Request\RequestClass as Request;
use App\Model\UserModel;
use App\Controllers\Validator\ValidatorClass;
use SplObserver;
use Core\logs\LogClass;

/**
 * Class addController
 * @package App\Controllers
 */
class addController extends Controller implements \SplSubject
{
    private $observers;
    private $logMessage;
    private $logeer;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
        $this->logeer    = new LogClass();
    }

    public function getLogMessage()
    {
        return $this->logMessage;
    }
    /**
     * @param Request $data
     * @param null $redirect
     * @throws \Core\Exceptions\ExceptionClass
     */
    public function getPostData(Request $data, $redirect = null)
    {
        $validator = new ValidatorClass();
        $email = $data->getElement('email');
        $phone = $data->getElement('phone');
        $pass  = sha1($data->getElement('pass'));
        $repass  = sha1($data->getElement('repass'));
        //die(var_dump($pass));
        $validateArray = ["email" => $email, "phone" => $phone, "pass" =>$pass];
        $response = $validator->validate($validateArray);
        if($response === true) {
            $user = new UserModel();
            $existedUsers = $user->getData();
            if ($pass === $repass) { //Проверка на совпадение паролей
                foreach ($existedUsers as $u) {
                    foreach ($u as $k => $v) {
                        if (($k === 'email') && ($email === $v)) {
                            //Here I have to start logger
                            $this->logMessage = "\n" . date("d-m-y H:m") . ": User $v has knocked the door!";
                            $this->attach($this->logeer);
                            $this->notify();
                            //end
                            return;
                        }
                    }
                }
                $this->logMessage = "\n" . date("d-m-y H:m") . ": Unexisted user has knocked! ";
                $this->attach($this->logeer);
                $this->notify();
            }
        }
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}