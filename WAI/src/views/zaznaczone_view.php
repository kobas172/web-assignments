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
            <img class="big-circle" src="static/images/big-eclipse.svg" alt=""/>
            <div class="gallery">
                <form method="POST">
                    <div class="imagesGallery">
                    <?php foreach($images as $image):?>
                        <div class="photo">
                            <input type="checkbox" name="<?=$image['_id']?>"/>
                            <br>
                            <a href="<?=$image['photoWatermark']?>" target="_blank"><img src="<?=$image['photoThumbnail']?>" alt="<?=$image['watermark']?>"></a>
                            <br/>
                            <p>Tytuł: <span><?=$image['title']?></span></p>
                            <p>Autor: <span><?=$image['author']?></span></p>
                        </div>
                    <?php endforeach ?>
                    </div>
                    <br>
                    <div class="paging">
                        <?php 
                            for ($page = 1; $page <= $pages; $page++) {
                                echo '<a href="/zaznaczone?page='.$page.'">'.$page.' '.'</a>';
                            }
                        ?>
                        <br>
                        <input type="submit" value="Usuń zaznaczone" class="buttons">
                    </div>
                </form>
            </div>
        </main>

        <?php
            include '../views/partial/footer_view.php';
        ?>


    </body>


</html>