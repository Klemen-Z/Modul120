<?php

class dbController extends  dbModel {

    public function createUser ($id,$username,$name,$firstname,$password,$email,$admin) {
        $this->setUser($id,$username,$name,$firstname,$password,$email,$admin);
    }
    public function createBook ($id,$catalog,$nummber,$shorttitle,$kategorie,$sell,$buyer,$autor,$title,$language,$imagepath,$verfasser,$state) {
        $this->setBooks($id,$catalog,$nummber,$shorttitle,$kategorie,$sell,$buyer,$autor,$title,$language,$imagepath,$verfasser,$state);
    }
}