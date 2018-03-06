<?php

$questions = new question();
$isCorrect = false;
// Afficher tableau avec la liste des questions
$listQuestion = $questions->displayQuestions();
// On choisit l'id la question
$questions->id = 1;
// On n'affiche l'information par rapport a l'id ci-dessus
$infoQuestion = $questions->displayInformation();

$correctAnswerByQuestion = $questions->displayResultByQuestion();
