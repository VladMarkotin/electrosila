<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 09.05.2018
 * Time: 12:19
 */

namespace Core;


abstract class AbstractCore
{

    abstract public function init();

    const PATH_TO_TEMPLATES = "app/views/templates/";
} 