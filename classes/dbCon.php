<?php
class dbCon
{
    public function connect(){
        $connect = new PDO('mysql:host=localhost;dbname=m120', 'root', '');
        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $connect;
    }
}