
<?php

class dataBase {

    //L'attribut $db sera disponible dans ses enfants
    protected $db;

    const PREFIX = 'pokfze_';

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=192.168.1.164;dbname=test-e-quizz;charset=utf8', 'usr_test-e-quizz', 'test-e-quizz');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function __destruct() {

    }

}

?>
