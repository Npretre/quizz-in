<?php
include_once 'models/database.php';
include_once 'models/users.php';
include_once 'models/result.php';
include_once 'models/question.php';
include_once 'models/answers.php';
include_once 'controllers/answersController.php';
include_once 'controllers/questionController.php';
include_once 'controllers/resultController.php';
include_once 'controllers/usersController.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienvenue</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="assets/libs/knacss/knacss.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/master.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Quizz-in</h1>

        <?php foreach ($listQuestion as $question) { ?>
            <div class="">
                <div id="result">
                    <?php
                    if ($isCorrect == 1) {
                        echo 'Bravo !';
                    } else {
                        echo 'T nul';
                    }
                    ?>
                    <p><?= $question->question ?></p>
                    <button>Question suivanteuh</button>
                </div>
                <form>
                    <h2 id="<?= $question->id; ?>" class = "txtcenter">Question <?= $question->id; ?>/10</h2>
                    <p><?= $question->question; ?></p>
                    <form-group >
                        <ul>
                            <?php foreach ($listAnswers as $response) { ?>

                                <li class="answers">
                                    <input  type="radio" name="radio" id="<?= $response->id ?>" class="a" />
                                    <label for="m"><?= $response->answer ?></label>
                                </li>
                            <?php } ?>
                        </ul>
                    </form-group>  
                </form>
            </div>
        <?php } ?>
        <form>

        </form>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script>
            var showAnswer = function () {
                $('#result').toggle() // AFFICHE ET CACHE A CHAQUE CLIQUE SUR LE BOUTTON
            };
            $('#m').click(showAnswer);
            $('#f').click(showAnswer);
            $('#5').click(showAnswer);


            $(".nextButton").click(function () {
                $parent = $(this).parent().parent();
                $parentNext = $(this).parent().parent().next();
                if ($parent.hasClass("visible")) {
                    $parent.removeClass("visible");
                    $parent.addClass("hidden");
                    $parentNext.removeClass("hidden");
                    $parentNext.addClass("visible");
                }
            });
        </script>
    </body>
</html>
