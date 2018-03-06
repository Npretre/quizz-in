<?php
include_once 'models/database.php';
include_once 'models/answers.php';
include_once 'models/question.php';
include_once 'models/result.php';
include_once 'models/users.php';
include_once 'controllers/answersController.php';
include_once 'controllers/questionController.php';
include_once 'controllers/resultController.php';
?>
<html>
    <head>
        <title>Quizz</title>
    </head>
    <body>
        <div>
            <?php foreach ($statError as $error) { ?>
                <p><?= $error ?></p>
            <?php } ?>
        </div>
        <form action="#" method="POST">
            <label for="ageMin">Age minimum<input name="ageMin" type="text" /></label>
            <label for="ageMax">Age maximum<input name="ageMax" type="text" /></label>
            <input name="submit" type="submit" />
        </form>
        <?php if ($ageSet) { ?>
            <p><?= $percentageByAge ?>%</p>
        <?php } ?>
        <p>Hommes : <?= $percentageMen ?>%</p>
        <p>Femmes : <?= $percentageWomen ?>%</p>
        <p>Les réponses : </p>
        <?php var_dump($listAnswers); ?>
        <p>Les questions : </p>
        <?php var_dump($listQuestion); ?>
        <?php var_dump($infoQuestion->description); ?>
        <p>Résultat:<p>
            <?php var_dump($listResultByQuestion); ?>
    </body>
</html>

