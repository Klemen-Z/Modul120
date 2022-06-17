<?php

class dbController extends  dbModel {

    public function createUser ($id,$username,$name,$firstname,$password,$email,$admin) {
        $this->setUser($id,$username,$name,$firstname,$password,$email,$admin);
    }

}