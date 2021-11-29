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
        <br>
        <?php 
            if ($isLogged === false) { 
                include_once '../views/partial/registration_view.php';
            } 
            else {
                include_once '../views/partial/logged_view.php';
            }
        ?>

        <?php
            include_once '../views/partial/footer_view.php';
        ?>


    </body>
</html>