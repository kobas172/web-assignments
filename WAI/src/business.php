<?php

use MongoDB\BSON\ObjectID;

function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function watermark($watermark, $fileExt, $fileName)
{
    if ($fileExt == 'png') {
    $image = imagecreatefrompng('images/'.$fileName.'.'.$fileExt);
    $textcolor = imagecolorallocate($image, 0, 0, 0);
    imagettftext($image, 14, 0, imagesx($image)-125, imagesy($image)-20, $textcolor, 'static/fonts/arial.ttf', $watermark);
    imagepng($image, 'images/'.$fileName.'watermark'.'.'.$fileExt);  
    imagedestroy($image);
    } else {
        $image = imagecreatefromjpeg('images/'.$fileName.'.'.$fileExt);
        $textcolor = imagecolorallocate($image, 0, 0, 0);
        imagettftext($image, 14, 0, imagesx($image)-125, imagesy($image)-20, $textcolor, 'static/fonts/arial.ttf', $watermark);
        imagejpeg($image, 'images/'.$fileName.'watermark'.'.'.$fileExt);
        imagedestroy($image);
    }
}

function thumbnail($fileExt, $fileName)
{
    $width = 200;
    $height = 125;
    if ($fileExt == 'png') {
        $image = imagecreatefrompng('images/'.$fileName.'.'.$fileExt);
        $image = imagescale($image, $width, $height);
        imagepng($image, 'images/'.$fileName.'thumbnail'.'.'.$fileExt);  
        imagedestroy($image);
        } else {
            $image = imagecreatefromjpeg('images/'.$fileName.'.'.$fileExt);
            $image = imagescale($image, $width, $height);
            imagejpeg($image, 'images/'.$fileName.'thumbnail'.'.'.$fileExt);
            imagedestroy($image);
        }
}

function toDataBase($watermark, $fileExt, $fileName, $title, $author)
{
    $db = get_db();

    $image = [
        'watermark' => $watermark,
        'title' => $title,
        'author' => $author,
        'extension' => $fileExt,
        'photo' => 'images/'.$fileName.'.'.$fileExt,
        'photoWatermark' =>'images/'.$fileName.'watermark'.'.'.$fileExt,
        'photoThumbnail' => 'images/'.$fileName.'thumbnail'.'.'.$fileExt,
    ];

    $db->gallery->insertOne($image);
}

function getCertainImages($skip, $limit)
{
    $db = get_db();
    $query = [];
    $opts = [
        'skip' => $skip,
        'limit' => $limit,
    ];

    $images = $db->gallery->find($query, $opts);

    return $images;
}

function getImages()
{
    $db = get_db();

    $images = $db->gallery->find();

    return $images;
}

function logDataToDb($mail, $login, $password)
{
    $db = get_db();

    $user = [
        'mail' => $mail,
        'login' => $login,
        'password' => $password,
    ];

    $db->users->insertOne($user);
}

function getUserData ($login)
{
    $db = get_db();
    $user = $db->users->findOne(['login' => $login]);

    return $user;
}

function isLoginAvailable ($login)
{
    $db = get_db();

    $query = [
        'login' => $login,
    ];

    $logins = $db->users->findOne($query);

    return count($logins);
}

function allSessionImages()
{
    $photos = array();
    $db = get_db();

    $images = $db->gallery->find();

    foreach($images as $image) {
        foreach ($_SESSION as $sess) {
            $id = $image['_id'].'';
            if (array_key_exists($id, $sess)) {
                array_push($photos, $image);      
            }
        }
    }
    return $photos;
}

function sessionImages($pages)
{
    $photos = array();
    $db = get_db();

    $images = $db->gallery->find();

    foreach($images as $image) {
        for ($int = 1; $int <= $pages; $int++) {
            $id = $image['_id'].'';
            if (isset($_SESSION['C'.$int])) {
                if (array_key_exists($id, $_SESSION['C'.$int])) {
                    array_push($photos, $image);      
                }
            }
        }
    }
    return $photos;
}

function certainSessionImages($skip, $limit, $photos)
{
    $query = [];
    $opts = [
        'skip' => $skip,
        'limit' => $limit,
    ];

    $images = array();

    for ($int = $skip; $int < $skip+$limit; $int++)
    {
        if (isset($photos[$int])) {
            array_push($images, $photos[$int]);
        }
    }

    return $images;
}
