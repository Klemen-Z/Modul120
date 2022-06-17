<?php
include_once '../static/autoload.php';

$db = new dbView();
print_r($db->showUsers());