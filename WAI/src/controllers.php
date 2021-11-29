<?php
require_once 'business.php';


function index(&$model)
{ 
    return 'index_view';
}

function galeria(&$model)
{
    $photos = getImages();
    $photos = $photos->toArray();
    $quantity = count($photos);
    $pageSize = 5;
    $pages = ceil($quantity/$pageSize);
    $model['pages'] = $pages;
    $model['page'] = 1;

    if(!isset($_GET['page'])) {
        $page = 1;
        $model['page'] = $page;
    } else {
        $page = $_GET['page'];
        $model['page'] = $page;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['C'.$model['page']] = $_POST;
    }

    $skip = ($page - 1) * $pageSize;
    $limit = $pageSize;

    $certainPhotos = getCertainImages($skip, $limit, $pages);
    $model['images'] = $certainPhotos;


    return 'galeria_view';
}

function ranking(&$model)
{
    return 'ranking_view';
}

function upload(&$model)
{
    $model['isAdded'] = false;
    if (isset($_POST['submit'])) {
        
        $model['errorText'] = false;

        $file = $_FILES['file'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $watermark = $_POST['watermark'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $isOk = true;
        
        $fileExtension = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExtension));
        $fileNewName = uniqid('',true);

        $mimeType = getimagesize( $file['tmp_name'] )['mime'];   
        $fileElements = explode('/', $mimeType);
        $fileExt = strtolower(end($fileElements));

        $allowed = array('jpg', 'jpeg', 'png');
        $fileDestination = 'images/'.$fileNewName.'.'.$fileActualExtension;

        if(!in_array($fileExt, $allowed)) {
            $model['errorText'] = 'Nie możesz przesłać zdjęcia tego typu! ';
            $isOk = false;
            $model['isAdded'] = true;
        } else {
            if($fileSize > 1048576) {
                $model['errorText'] = "Ten plik jest za duży!";
                $isOk = false;
                $model['isAdded'] = true;
            }
        }
        
        if($isOk) {
            move_uploaded_file($fileTmpName, $fileDestination);
            $model['isAdded'] = true;
            watermark($watermark, $fileActualExtension, $fileNewName);
            thumbnail($fileActualExtension, $fileNewName);
            toDataBase($watermark, $fileActualExtension, $fileNewName, $title, $author);
        }
    }
    return 'upload_view';
}

function logowanie(&$model)
{
    $model['isLogged'] = false;
    $model['checkIf'] = false;
    $model['isAdded'] = false;

    if (isset($_POST['submit'])) {
        $model['errorText'] = false;
        $login = $_POST['login'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $quantity = isLoginAvailable($login);

        if ($quantity > 0) {
            $model['errorText'] = "Podany login jest już zajęty!";
            $model['isAdded'] = true;
        } else {
            if ($password === $password2) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                logDataToDb($mail, $login, $password);
            } else {
                $model['errorText'] = "Podane hasła są różne!";
                $model['isAdded'] = true;
            }
        }
    }

    if (isset($_POST['logsubmit'])) {
        $loglogin = $_POST['loglogin'];
        $logpassword = $_POST['logpassword'];

        $model['error'] = false;

        $user = getUserData($loglogin);
        $model['login'] = $loglogin;

        if ($user !== null && password_verify($logpassword, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $loglogin;
        } else {
            $model['checkIf'] = true;
            $model['error'] = 'Niepoprawny login lub hasło!';
        }
    }

    if (isset($_POST['submitlogged'])) {
        session_destroy();
        $model['islogged'] = false;

        return 'logowanie_view';
    }

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $model['isLogged'] = true;
    }


    return 'logowanie_view';
}

function menu(&$model)
{
    return 'partial/menu_view';
}

function footer(&$model)
{
    return 'partial/footer_view';
}

function zaznaczone(&$model)
{

    $dbphotos = getImages();
    $dbphotos = $dbphotos->toArray();
    $dbquantity = count($dbphotos);
    $dbpageSize = 5;
    $dbpages = ceil($dbquantity/$dbpageSize);


    $photos = sessionImages($dbpages);
    $quantity = count($photos);
    $pageSize = 5;
    $pages = ceil($quantity/$pageSize);
    $model['pages'] = $pages;
    $model['page'] = 1;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        for($int = 1; $int <= $dbpages; $int++) {
            if (isset($_SESSION['C'.$int])) {
                $chosen = $_SESSION['C'.$int];
                foreach ($_POST as $element=>$value) {
                    if($element) {
                        $chosen2 = array_keys($chosen);
                        if (array_search($element, $chosen2) !== false) {
                            $key = array_search($element, $chosen2);
                            unset($chosen[$chosen2[$key]]);
                        }
                    }
                }
                $_SESSION['C'.$int] = $chosen;
                }
            }
        return 'redirect:zaznaczone';
    }

    if(!isset($_GET['page'])) {
        $page = 1;
        $model['page'] = $page;
    } else {
        $page = $_GET['page'];
        $model['page'] = $page;
    }

    $skip = ($page - 1) * $pageSize;
    $limit = $pageSize;

    $certainPhotos = certainSessionImages($skip, $limit, $photos);
    $model['images'] = $certainPhotos;


    return 'zaznaczone_view';
}
