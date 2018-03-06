<?php

class database {

    //L'attribut $db sera disponible dans ses enfants
    protected $db;
    const PREFIX = 'pokfze_';

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=192.168.1.164;dbname=test-e-quizz;charset=utf8', 'usr_test-e-quizz', 'test-e-quizz');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function __destruct() {
        $this->db = NULL;
    }

}
