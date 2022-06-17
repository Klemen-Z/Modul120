<?php

class dbModel extends dbCon {

    protected function getUser(): bool|array
    {
        $sql = "SELECT * FROM benutzer";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    protected function getBooks(): bool|array
    {
        $sql = "SELECT * FROM buecher";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    protected function setUser($id,$username,$name,$firstname,$password,$email,$admin) {
        $sql = "INSERT INTO users(ID,username,name,firstname,password,email,admin) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id,$username,$name,$firstname,$password,$email,$admin]);
    }
    protected function setBooks() {
        $sql = "INSERT INTO users() VALUES ($id,$katalog,$nummber,$)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
}