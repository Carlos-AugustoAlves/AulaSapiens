<?php
    session_start();
    if(!isset($_SESSION['id_user']))
    {
        echo "<script>alert('Não foi possível logar, tente novamente mais tarde!');
            location.href='index.php'
            </script>";
    }

    include ('head.php');
    include ('menu.php');
    include ('footer.php');
    include_once ('conexao.php');

?>