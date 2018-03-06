<?php

class question extends database {

//Attribut public
    public $id = 0;
    public $question = '';
    public $picture = '';
    public $description = '';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Afficher toutes les questions
     * @return array()
     */
    public function displayQuestions() {
        $listQuestions = array();
        $sql = 'SELECT `id`, `question`, `picture` FROM `pokfze_question`';
        $result = $this->db->query($sql);
        $listQuestions = $result->fetchAll(PDO::FETCH_OBJ);
        return $listQuestions;
    }

    public function displayResultByQuestion() {
        $sql = 'SELECT `pokfze_answers`.`answer`FROM `pokfze_answers`INNER JOIN  `pokfze_question` ON `pokfze_question`.`id` = `pokfze_answers`.`id_pokfze_question`WHERE `pokfze_answers`.`isCorrect` = 1 AND `pokfze_question`.`id` = :idQuestion';
        $result = $this->db->prepare($sql);
        $result->bindValue(':idQuestion', $this->id, PDO::PARAM_INT);
        if ($result->execute()) {
            $answerByQuestion = $result->fetch(PDO::FETCH_OBJ);
        }
        return $answerByQuestion;
    }

    /**
     * Afficher l'information par rapport a l'id de la question concerné
     */
    public function displayInformation() {
        $sql = 'SELECT `description` FROM `pokfze_question` WHERE `id` = :idQuestion';
        $result = $this->db->prepare($sql);
        $result->bindValue(':idQuestion', $this->id, PDO::PARAM_INT);
        if ($result->execute()) {
            $youKnow = $result->fetch(PDO::FETCH_OBJ);
        }
        return $youKnow;
    }

    public function __destruct() {
        parent::__destruct();
    }

}
