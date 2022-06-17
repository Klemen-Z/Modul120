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
    protected function setBooks($id,$catalog,$nummber,$shorttitle,$kategorie,$sell,$buyer,$autor,$title,$language,$imagepath,$verfasser,$state) {
        $sql = "INSERT INTO users() VALUES (id,katalog,nummber,shorttitle,kategorie,sell,buyer,autor,title,language,imagepath,verfasser,state) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id,$catalog,$nummber,$shorttitle,$kategorie,$sell,$buyer,$autor,$title,$language,$imagepath,$verfasser,$state]);
    }
    protected function filterUser($what,$whatwhat) {
        $yes = "%".$whatwhat."%";
        $sql = "SELECT * FROM benutzer where $what like ?";
        echo $sql;
        $stmt = $this->connect();
        $stmt = $stmt->prepare($sql);
        $stmt = $stmt->bindparam(1,$sql);
        $stmt->execute();
    }
}