<?php
include_once '../static/autoload.php';

$db = new dbView();
//print_r($db->showfilteredUsers("vorname","Duc"));
print_r($db->showfilteredBooks("ID","1"));


