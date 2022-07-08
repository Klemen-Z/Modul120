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
    protected function filterUsers($what,$whatwhat): bool|array
    {
        $yes = "%".$whatwhat."%";
        $sql = "SELECT * FROM benutzer WHERE $what like ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$yes]);
        return $stmt->fetchAll();
    }
    protected function filterBooks($what,$whatwhat): bool|array
    {
        $yes = "%".$whatwhat."%";
        $sql = "SELECT * FROM buecher WHERE $what like ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$yes]);
        return $stmt->fetchAll();
    }
    protected function getpassword($username): bool|array
    {
        $sql = "SELECT * FROM benutzer WHERE benutzername = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetchAll();
    }
    protected function getsortedUser($sortby,$how): bool|array
    {
        $sql = "SELECT * FROM benutzer ORDER BY $sortby $how ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    protected function getsortedBooks($sortby,$how): bool|array
    {
        $sql = "SELECT * FROM buecher ORDER BY $sortby $how";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}