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
            <section class="main-section">
                <div class="upload">
                    <h2>Prześlij nam swoją ulubioną wodę!</h2>
                    <br>
                    <p>Wybierz zdjęcie do wysłania:</p>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" id="fileToUpload" class="buttonsgallery" accept=".png, .jpg, .jpeg" required>
                        <br>
                        <input type="text" placeholder="Tytuł:" name="title" class="buttonsgallery" required>
                        <br>
                        <input type="text" placeholder="Autor:" name="author" class="buttonsgallery" required>
                        <br>
                        <input type="text" placeholder="Watermark:" name="watermark" class="buttonsgallery" required>
                        <br>
                        <input type="submit" value="Prześlij zdjęcie" name="submit" class="buttonsgallery" required>
                    </form>
                    <?php if($isAdded == true) 
                        echo $errorText;
                    ?>
                </div>
            </section>
            <img class="big-circle" src="static/images/big-eclipse.svg" alt=""/>
        </main>

        <?php
            include_once '../views/partial/footer_view.php';
        ?>


    </body>


</html>