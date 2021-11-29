<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Picie wody</title>
        <link rel="stylesheet" href="static/css/style.css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
        <script src="static/js/script.js"></script>
    </head>

    <body>

        <?php
            include_once '../views/partial/menu_view.php';
        ?>

        
        <main>
            <section class="table-section">
                <div class="title">
                    <h1>Ranking wód:</h1>
                </div>
                <div class="table-class">
                    <table>
                        <tr class="table-header">
                            <th>Miejsce:</th>
                            <th>Nazwa:</th>
                            <th>Opis:</th>
                        </tr>
                        <tr>
                            <th>1.</th>
                            <td>Nałęczowianka</td>
                            <td>Nałęczowianka to król wód, tak jak lew jest królem dżungli, tak jak szczupak jest królem łowiska.</td>
                        </tr>
                        <tr>
                            <th>2.</th>
                            <td>Muszynianka</td>
                            <td>Ulubiona woda klocucha i Taco Hemingway. "Muszyne rozumiem, ale ***** jakieś Ice Tea?" "Wodniczka skarb życia muszyna."</td>
                        </tr>
                        <tr>
                            <th>3.</th>
                            <td>Mama i ja</td>
                            <td>Bardzo delikatny smak tej wody może poruszyć nawet zatwardziałego fana innej wody. Pozycja warta do spróbowania!</td>
                        </tr>
                        <tr>
                            <th>4.</th>
                            <td>Żywiec Zdrój</td>
                            <td>Prawdopodobnie najpopularniejsza woda w Polsce. Wydobywana z ujęcia PILSKO II w Cięcinie koło Żywca. Posiada swoich fanów, jak i wrogów.</td>
                        </tr>
                        <tr>
                            <th>5.</th>
                            <td>Kropla beskidu</td>
                            <td>Ukradła moje serce w roku 2013 kiedy z lenistwa nie chciało mi się śmigać do innego sklepu po Nałęczowiankę. Bardzo przyjemna w smaku, z pewnością wywyższa się nad innymi wodami w swoim przedziale cenowym.</td>
                        </tr>
                        <tr>
                            <th>6.</th>
                            <td>Dobrowianka</td>
                            <td>Prawdopodobnie najbardziej niespodziewana pozycja w tym rankingu. Jako nieliczna w tym rankingu może być spożywana schłodzona lub w temperaturze pokojowej bez utraty smaku. Nie jest to na pewno main streamowa woda. Osobiście znam tylko dwie osoby pijące ją na codzień.</td>
                        </tr>
                        <tr>
                            <th>7.</th>
                            <td>Piwniczanka</td>
                            <td>Coś dla prawdziwych piwniczaków. Nie ma w niej nic specjalnego, poza posmakiem rujnowania sobie życia grając samemu w ciemnym pokoju w lola morganą na bocie w silverze IV już 5 tydzień z rzędu.</td>
                        </tr>
                        <tr>
                            <th>Ostatnie.</th>
                            <td>Cisowianka</td>
                            <td>Najgorsza woda pitna dostępna w sklepie. Nazywają się liderem w branży co jest większym kłamstwem, niż jakbym powiedział, że 5G smaży mózgi czy Bill Gates chce skontrolować świat swoimi szczepionkami.</td>
                        </tr>
                    </table>
                </div>
            </section>

            <img class="big-circle" src="static/images/big-eclipse.svg" alt=""/>
        </main>

        
        <?php
            include_once '../views/partial/footer_view.php';
        ?>

    </body>

</html>
