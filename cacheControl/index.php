<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 5/19/14
 * Time: 3:04 PM
 */

function __autoload($class_name) {
    require_once 'class/' . $class_name . '.php';
}

$a = new cache();