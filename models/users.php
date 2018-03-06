<?php

class users extends database {

    public $id = 0;
    public $username = '';
    public $gender = 0;
    public $currentDate = '01/01/1970';
    public $birthday = '01/01/1970';
    public $ageMin = 0;
    public $ageMax = 0;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Ajout d'utilisateur
     */
    public function addUser() {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `' . self::PREFIX . 'user` (``birthdate`, `gender`, `username`) VALUES (:birthdate, :gender, :username)';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':username', $this->username, PDO::PARAM_STR);
        $responseRequest->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $responseRequest->bindValue(':gender', $this->gender, PDO::PARAM_INT);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }

    public function displayResultCorrectByUser() {
        $sql = 'SELECT COUNT(*) AS `nbrResponsTrue` FROM `' . self::PREFIX . 'user` INNER JOIN `' . self::PREFIX . 'result` ON `' . self::PREFIX . 'user`.`id` = `' . self::PREFIX . 'result`.`id_pokfze_user`INNER JOIN `' . self::PREFIX . 'answers` ON `' . self::PREFIX . 'result`.`id_pokfze_answers` = `' . self::PREFIX . 'answers`.`id` WHERE `' . self::PREFIX . 'answers`.`isCorrect` = 1 AND `' . self::PREFIX . 'user`.`id`= :idUser';
        $result = $this->db->prepare($sql);
        $result->bindValue(':idUser', $this->id, PDO::PARAM_INT);
        if ($result->execute()) {
            $nbResultCorrectByUser = $result->fetch(PDO::FETCH_OBJ);
        }
        return $nbResultCorrectByUser;
    }

    public function displayStatByGender() {
        $sql = 'SELECT COUNT(*) AS `total`, (SELECT COUNT(*) AS `total` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE `pokfze_answers`.`isCorrect` = 1 AND `pokfze_user`.`gender` = :gender) AS `good` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE `pokfze_user`.`gender` = :gender';
        $result = $this->db->prepare($sql);
        $result->bindValue(':gender', $this->gender, PDO::PARAM_INT);
        if ($result->execute()) {
            $resultByGender = $result->fetch(PDO::FETCH_OBJ);
        }
        return $resultByGender;
    }

    public function displayStatByAge() {
        $sql = 'SELECT COUNT(*) AS `total`, (SELECT COUNT(*) AS `total` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE `pokfze_answers`.`isCorrect` = 1 AND FLOOR(DATEDIFF(NOW(), `pokfze_user`.`birthday`) / 365) BETWEEN :agemin AND :agemax) AS `good` FROM `pokfze_result` LEFT JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` LEFT JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` WHERE FLOOR(DATEDIFF(NOW(), `pokfze_user`.`birthday`) / 365) BETWEEN :agemin AND :agemax ';
        $result = $this->db->prepare($sql);
        $result->bindValue(':agemin', $this->ageMin, PDO::PARAM_INT);
        $result->bindValue(':agemax', $this->ageMax, PDO::PARAM_INT);
        if ($result->execute()) {
            $resultByAge = $result->fetch(PDO::FETCH_OBJ);
        }
        return $resultByAge;
    }

    public function __destruct() {
        parent::__destruct();
    }

}
