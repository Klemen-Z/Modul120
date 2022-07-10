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
    protected function setUser($username,$name,$firstname,$password,$email) {
        $sql = "INSERT INTO benutzer(benutzername,name,vorname,passwort,email,admin) VALUES (?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username,$name,$firstname,$password,$email,0]);
    }
    protected function setBooks($id,$catalog,$nummber,$shorttitle,$kategorie,$sell,$buyer,$autor,$title,$language,$imagepath,$verfasser,$state) {
        $sql = "INSERT INTO buecher() VALUES (id,katalog,nummber,shorttitle,kategorie,sell,buyer,autor,title,language,imagepath,verfasser,state) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id,$catalog,$nummber,$shorttitle,$kategorie,$sell,$buyer,$autor,$title,$language,$imagepath,$verfasser,$state]);
    }
    protected function filterUsers($what,$whatwhat,$sortby,$how): bool|array
    {
        $yes = "'%".$whatwhat."%'";
        $sql = "SELECT * FROM benutzer WHERE $what like $yes ORDER BY $sortby $how";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    protected function filterBooks($what,$whatwhat,$sortby,$how): bool|array
    {
        $yes = "'%".$whatwhat."%'";
        $sql = "SELECT * FROM buecher WHERE $what like $yes ORDER BY $sortby $how";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    protected function getpassword($username): bool|array
    {
        $sql = "SELECT * FROM benutzer WHERE benutzername = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetchAll();
    }
    protected function filtername($name): bool|array
    {
        $sql = "SELECT * FROM benutzer WHERE benutzername = $name";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}