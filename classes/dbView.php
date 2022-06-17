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
    public function filterUser($what,$whatwhat) {
        $yes = "%".$whatwhat."%";
        $sql = "SELECT * FROM benutzer where $what like $yes";
        echo $sql;
        $results = $this->filterUser($what,$whatwhat);
        return $results;
    }
}