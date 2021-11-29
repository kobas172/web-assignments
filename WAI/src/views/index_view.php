<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Picie wody</title>
        <link rel="stylesheet" href="static/css/style.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">   
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="static/js/script.js"></script>
        <script src="static/js/jqueryui.js"></script>
        <noscript>
            <style>
                .fav {display:none;}
                #wody {display:none;}
                #hide {display:none;}
                #popup {display:none;}
            </style>
        </noscript>
    </head>

    <body>

        <?php
        include_once '../views/partial/menu_view.php';
        ?>

        <main>
            <section class="main-section"  id="font">
                <div class="introduction">
                    <h2>Jak to się wszystko zaczęło?</h2> <br/>
                    <p>Swoją historię z wodą rozpocząłem już jako dziecko. Uwielbiałem ją, bardzo szybko jej picie stało się moim hobby. Niektóre smakowały nieco lepiej, a niektóre niestety gorzej. Jako ekspert postaram się wyjaśnić każdemu jaką wodę należy pić, która jest najlepsza, a jakiej powinniśmy unikać.</p>
                </div>
                <div class="expert">
                    <h2>Dlaczego nazywam się ekspertem?</h2> <br/>
                    <p>Nazywam się ekspertem, bo mogę i myślę że znam się na wodzie.</p>
                </div>
                <div class="future">
                    <h2>Co zamierzam zmienić w świecie wody?</h2> <br/>
                    <p>Planuję wycofać cisowiankę z kupna, ponieważ nie da się jej pić.</p>
                </div>
                <div class="question">
                    <h2>Czy wyniesiesz coś z tej strony?</h2> <br/>
                    <p>Prawdopodobnie nic, ale przynajmniej dowiesz się której wody lepiej nie pić.</p>
                </div>
                <div class="sites">
                    <h2>Dlaczego warto pić wodę?</h2>
                    <p><a href="https://www.pacjent.gov.pl/aktualnosc/dlaczego-warto-pic-wode" target="_blank">pacjent.gov.pl</a></p>
                    <p><a href="https://www.youtube.com/watch?v=GEmyyWESkYk" target="_blank">Po co mi woda?</a></p>
                </div>
                <div class="fav">
                    <h2>Jaka jest twoja ulubiona woda?</h2>
                    <label class="fav-woda" for="local">Wpisz tutaj: </label>
                    <form onsubmit="saveData()">
                        <input class="fav-woda" type="text" name="local" id="saveLocal"></br>
                        <input class="buttons" type="submit" value="Wyślij">
                        <input type="button" class="buttons" onclick="writeFavourite()" value="Wczytaj" id="button-hide">
                    </form>
                </div>
                <div id="wody">
                    <h2>Twoja ulubiona: </h2> <br/>
                </div>
            </section>

            <img class="big-circle" src="static/images/big-eclipse.svg" alt=""/>
        </main>

        <?php
        include_once '../views/partial/footer_view.php';
        ?>
        
    </body>

</html>