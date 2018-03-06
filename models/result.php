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
        $sql = 'INSERT INTO `pokfze_result`(`id_pokfze_user`, `id_pokfze_question`, `id_pokfze_answers`) VALUES (:resultUserId,:resultQuestionId,:resultAnswersId)';
        $result = $this->db->prepare($sql);
        $result->bindValue(':resultUserId', $this->id_user, PDO::PARAM_INT);
        $result->bindValue(':resultQuestionId', $this->id_question, PDO::PARAM_INT);
        $result->bindValue(':resultAnswersId', $this->id_answers, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Afficher les résultats par rapport a la question choisit
     * @return array()
     */
    public function displayResultByQuestion() {
        $listResultByQuestion = array();
        $sql = 'SELECT `pokfze_result`.`id`, `pokfze_result`.`id_pokfze_user`, `pokfze_result`.`id_pokfze_question`, `pokfze_result`.`id_pokfze_answers` FROM `pokfze_result` INNER JOIN `pokfze_question` ON `pokfze_result`.`id_pokfze_question` = `pokfze_question`.`id` WHERE `pokfze_result`.`id_pokfze_question` = :resultQuestionId';
        $result = $this->db->prepare($sql);
        $result->bindValue(':resultQuestionId', $this->id_question, PDO::PARAM_INT);
        if ($result->execute()) {
            $listResultByQuestion = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $listResultByQuestion;
    }

    public function countResultMen() {
        $query = 'SELECT COUNT(*) AS `total`, (SELECT COUNT(*) AS `total` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE `pokfze_answers`.`isCorrect` = 1 AND `pokfze_user`.`gender` = 0) AS `good` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE `pokfze_user`.`gender` = 1';
        $countList = $this->db->query($query);
        $countResultMen = $countList->fetch(PDO::FETCH_OBJ);
        return $countResultMen;
    }

    public function countResultWomen() {
        $query = 'SELECT COUNT(*) AS `total`, (SELECT COUNT(*) AS `total` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE `pokfze_answers`.`isCorrect` = 1 AND `pokfze_user`.`gender` = 0) AS `good` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE `pokfze_user`.`gender` = 0';
        $countList = $this->db->query($query);
        $countResultWomen = $countList->fetch(PDO::FETCH_OBJ);
        return $countResultWomen;
    }

    public function countResultByAge($ageMin, $ageMax) {
        $query = 'SELECT COUNT(*) AS `total`, (SELECT COUNT(*) AS `total` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE `pokfze_answers`.`isCorrect` = 1 AND FLOOR(DATEDIFF(NOW(), `pokfze_user`.`birthday`) / 365) BETWEEN 15 AND 40) AS `good` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE FLOOR(DATEDIFF(NOW(), `pokfze_user`.`birthday`) / 365) BETWEEN :ageMin AND :ageMax ';
        $countList = $this->db->prepare($query);
        $countList->bindValue(':ageMin', $ageMin, PDO::PARAM_INT);
        $countList->bindValue(':ageMax', $ageMax, PDO::PARAM_INT);
        $countList->execute();
        if ($countList->execute()) {
            $countResultByAge = $countList->fetch(PDO::FETCH_OBJ);
        }
        return $countResultByAge;
    }

    public function __destruct() {
        parent::__destruct();
    }

}
