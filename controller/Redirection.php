<?php

/*เซิร์ฟ shop_pj*/
function redirection($path)
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/shopProject$path";
    $url = 'Location: ' . $actual_link;
    header($url);
    exit();
}

/*เซิร์ฟ หลัก*/
/*function redirection($path)
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/agrstore$path";
    $url = 'Location: ' . $actual_link;
    header($url);
    exit();
}*/

/*เซิร์ฟ รอง*/
/*function redirection($path)
{
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST].$path";
    $url = 'Location: ' . $actual_link;
    header($url);
    exit();
}*/

?>