<?php
class dbCon
{
    var string $host = "localhost";
    var string $password = "php_is_cancerous";
    var int $port = 3306;
    var string $user = "Firma";
    var string $database = "firma_db_modul151";
    var mysqli $conn;

    function connect(){
        $this->conn = mysqli_connect($host, $user, $password, $database, $port);
    }
}