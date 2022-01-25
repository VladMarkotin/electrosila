<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.07.2019
 * Time: 12:33
 */
require_once  'vendor/autoload.php';

$core = Core\CoreClass::getInstance();
$core->init();
$router = $core->getSystemObject();

$router->FindPath();
