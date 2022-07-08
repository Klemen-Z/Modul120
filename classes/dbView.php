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
    public function showfilteredUsers($what,$whatwhat) {
        $results = $this->filterUsers($what,$whatwhat);
        return $results;
    }
    public function showfilteredBooks($what,$whatwhat) {
        $results = $this->filterBooks($what,$whatwhat);
        return $results;
    }
    public function showpassword($username) {
        $results = $this->getpassword($username);
        return $results;
    }
    public function makeuser($username,$name,$firstname,$password,$email) {
        $this->setUser($username,$name,$firstname,$password,$email);
    }
    public function showsortedUsers($sortby,$how) {
        $results = $this->getsortedUser($sortby,$how);
        return $results;
    }
    public function showsortedBooks($sortby,$how) {
        $results = $this->getsortedBooks($sortby,$how);
        return $results;
    }
}