<?php

// Initialiser la classe result()
$result = new result();
// On choisit l'id de la question+
$result->id_question = 1;
// Afficher tableau avec les résultats de la question par rapport a l'id ci-dessus
$listResultByQuestion = $result->displayStatByQuestion();
$countAllResultCorrect = $result->displayResultByCorrect();
$AllResult = $result->displayAllResult();

