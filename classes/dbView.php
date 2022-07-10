<?php

class dbView extends dbModel {
    public function showUsers() {
        $results = $this->getUser();
        return $results;
    }
    public function showBooks() {
        $results = $this->getBooks();
        return $results;
    }
    public function showfilteredUsers($what,$whatwhat,$sortby,$how) {
        $results = $this->filterUsers($what,$whatwhat,$sortby,$how);
        return $results;
    }
    public function showfilteredBooks($what,$whatwhat,$sortby,$how) {
        $results = $this->filterBooks($what,$whatwhat,$sortby,$how);
        return $results;
    }
    public function showpassword($username) {
        $results = $this->getpassword($username);
        return $results;
    }
    public function makeuser($username,$name,$firstname,$password,$email) {
        $this->setUser($username,$name,$firstname,$password,$email);
    }
    public function showusername($username) {
        $results = $this->getpassword($username);
        return $results;
    }
}