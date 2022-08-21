<?php

function redirection($path)
{
    header('Location:' . $path);
    exit;

}
