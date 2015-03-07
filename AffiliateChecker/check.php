<?php
/*** Autoload class files ***/
function __autoload($class){
    require('classes/' . strtolower($class) . '.class.php');
}
$id = $_POST['id'];

if (isset($id)) {
$avant = new avant;

if($avant->checkTran($id)) {

    echo "Affiliate Sale";
}
else {
    echo "NOT an Affiliate Sale";
}
}
