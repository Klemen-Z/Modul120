<?php

class dbView extends dbModel {
    public function showUsers() {
        $results = $this->getUser();
        return $results;
    }
}