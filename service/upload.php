<?php
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function uploadImage($file, $dir)
{
    $imagename = generateRandomString() . basename($file["name"]);
    $filename = $dir . $imagename;
    if (move_uploaded_file($file["tmp_name"], $filename)) {
        return $filename;
    }
    return null;
}
?>