<?php

class result extends database {

// Attribut public
    public $id = 0;
    public $id_user = 0;
    public $id_question = 0;
    public $id_answers = 0;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Insertion du résultat de la question par rapport au choix de l'utilisateur
     */
    public function insertResultQuestion() {
        $sql = 'INSERT INTO `' . self::PREFIX . 'result`(`id_pokfze_user`, `id_pokfze_question`, `id_pokfze_answers`) VALUES (:resultUserId,:resultQuestionId,:resultAnswersId)';
        $result = $this->db->prepare($sql);
        $result->bindValue(':resultUserId', $this->id_user, PDO::PARAM_INT);
        $result->bindValue(':resultQuestionId', $this->id_question, PDO::PARAM_INT);
        $result->bindValue(':resultAnswersId', $this->id_answers, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Afficher les statistique de résultats par rapport a la question donnée
     * @return array()
     */
    public function displayStatByQuestion() {
        $listResultByQuestion = array();
        $sql = 'SELECT `' . self::PREFIX . 'result`.`id`, `' . self::PREFIX . 'result`.`id_pokfze_user`, `' . self::PREFIX . 'result`.`id_pokfze_question`, `' . self::PREFIX . 'result`.`id_pokfze_answers` FROM `' . self::PREFIX . 'result` INNER JOIN `' . self::PREFIX . 'question` ON `' . self::PREFIX . 'result`.`id_pokfze_question` = `' . self::PREFIX . 'question`.`id` WHERE `' . self::PREFIX . 'result`.`id_pokfze_question` = :resultQuestionId';
        $result = $this->db->prepare($sql);
        $result->bindValue(':resultQuestionId', $this->id_question, PDO::PARAM_INT);
        if ($result->execute()) {
            $listResultByQuestion = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $listResultByQuestion;
    }

    /**
     * Afficher les résultats correctes
     * @return type
     */
    public function displayResultByCorrect() {
        $sql = 'SELECT count(`' . self::PREFIX . 'result`.`id`) FROM `' . self::PREFIX . 'result` INNER JOIN pokfze_answers ON pokfze_result.id_pokfze_answers = pokfze_answers.id WHERE pokfze_answers.isCorrect = 1';
        $result = $this->db->query($sql);
        $QuestionsCorrect = $result->fetch(PDO::FETCH_OBJ);
        return $QuestionsCorrect;
    }

    /**
     * Afficher le nombre de résultat
     */
    public function displayAllResult() {
        $sql = 'SELECT count(`id`) as `TotalResultat` FROM `' . self::PREFIX . 'result`';
        $result = $this->db->query($sql);
        $AllResult = $result->fetch(PDO::FETCH_OBJ);
        return $AllResult;
    }

    public function __destruct() {
        parent::__destruct();
    }

}
