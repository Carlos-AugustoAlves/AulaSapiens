<?php
    $banco      = "bd_prova";
    $user       = "root";
    $passwd     = "";
    $hostname   = "localhost";

    $mysqli = new mysqli($hostname, $user, $passwd, $banco);

    if(mysqli_connect_errno()) trigger_error(mysqli_connect_errno());
?>