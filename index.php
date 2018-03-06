<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienvenue</title>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.csss">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="assets/libs/knacss/knacss.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/master.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Test-e-Quizz</h1>
        <section class="autogrid">
            <section class="autogrid back">
            <form>
                <form-group>
                    <label for="" >Nom ou pseudo : </label><br/>
                    <input type="text" placeholder="NOM PSEUDO" />
                </form-group>    
                <br/><br/>
                <form-group>
                    <label for="" >Date de naissance : </label><br/>
                    <input type="date" placeholder="TON AGE" max="2001-01-01" />
                </form-group>    
                <br/><br/>
                <form-group>
                    <label for="" >Civilité : </label>
                    <ul class="is-unstyled">
                        <li>
                            <input type="radio" class="radio" name="radio" id="m">
                            <label for="m">Monsieur</label>
                        </li>
                        <li>
                            <input type="radio" class="radio" name="radio" id="f" checked="checked">
                            <label for="f">Madame</label>
                        </li>
                    </ul>
                </form-group>    
                <input type="submit" />
                <a href="question.php">Pouet </a>
            </form>
                </section>
        </section>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    </body>
</html>
