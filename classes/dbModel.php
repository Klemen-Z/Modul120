<?php

class dbModel extends dbCon {

    protected function getUser() {
        $sql = "SELECT * FROM benutzer";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

}