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
    public function passwordcheck($id,$password) {
        $results = $this->getpassword($id);
        if (password_verify($password, $results['password']) === $results['password']) {
            $result = true;
        } else $result = false;
        return $result;
    }
}