<?php

// Initialiser la classe result()
$result = new result();
// On choisit l'id de la question+
$result->id_question = 1;
// Afficher tableau avec les résultats de la question par rapport a l'id ci-dessus
$countResultMen = $result->countResultMen();
$percentageMen = ceil($countResultMen->good * 100 / $countResultMen->total);
$countResultWomen = $result->countResultWomen();
$percentageWomen = ceil($countResultWomen->good * 100 / $countResultWomen->total);
$listResultByQuestion = $result->displayResultByQuestion();
$ageSet = false;
$statError = array();
if (isset($_POST['submit'])) {
    $ageMin = '';
    $ageMax = '';
    if (!empty($_POST['ageMin'])) {
        $ageMin = $_POST['ageMin'];
        echo $ageMin;
    }
    if (!empty($_POST['ageMax'])) {
        $ageMax = $_POST['ageMax'];
        echo $ageMax;
    }
    if (isset($ageMax) && isset($ageMin)) {
        $ageSet = true;
        if ($ageSet) {
            $countResultByAge = $result->countResultByAge($ageMin, $ageMax);
        }
    }
    if (($countResultByAge->total != 0) && ($countResultByAge->good != 0)) {
        $percentageByAge = ceil($countResultByAge->good * 100 / $countResultByAge->total);
    } else {
        $statError['calcAge'] = 'Il n\'y a aucun résultat';
    }
    var_dump($countResultByAge->total);
    var_dump($countResultByAge->good);
}
