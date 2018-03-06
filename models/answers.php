<?php

class answers extends database {

//Attributs publics
    public $id = 0;
    public $answer = '';
    public $pictureAnswer = '';
    public $isCorrect = false;
    public $id_question = 0;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Afficher toutes les réponses par rapport l'id de la question
     * @return array()
     */
    public function displayAnswers() {
        $listAnswers = array();
        $sql = 'SELECT `' . self::PREFIX . 'answers`.`id`, `' . self::PREFIX . 'answers`.`answer`, `' . self::PREFIX . 'answers`.`pictureAnswer`, `' . self::PREFIX . 'answers`.`isCorrect`, `' . self::PREFIX . 'answers`.`id_pokfze_question` FROM `' . self::PREFIX . 'answers` INNER JOIN `' . self::PREFIX . 'question` ON `' . self::PREFIX . 'answers`.`id_pokfze_question` = `' . self::PREFIX . 'question`.`id` WHERE  `' . self::PREFIX . 'answers`.`id_pokfze_question` = :idQuestion';
        $resquestAnswers = $this->db->prepare($sql);
        $resquestAnswers->bindValue(':idQuestion', $this->id_question, PDO::PARAM_INT);
        if ($resquestAnswers->execute()) {
            $listAnswers = $resquestAnswers->fetchAll(PDO::FETCH_OBJ);
        }
        return $listAnswers;
    }

    public function __destruct() {
        parent::__destruct();
    }

}
