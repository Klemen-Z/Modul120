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
}