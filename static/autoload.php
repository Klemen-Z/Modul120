<?php

spl_autoload_register('myAutoLoader');

function myAutoloader($className) {
    $fullpath = '../classes/' .$className. '.php';

    if (!file_exists($fullpath)) {
        return false;
    }
    include_once $fullpath;
}