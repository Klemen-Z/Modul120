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
    public function showBookid($id) {
        $results = $this->getBookid($id);
        return $results;
    }
}