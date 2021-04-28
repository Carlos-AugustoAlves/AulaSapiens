<?php
    session_start();
    if(!isset($_SESSION['id_user']))
    {
        echo "<script>alert('Acesso restrito. Faça Login!');
            location.href='index.php'
            </script>";
    }

    include ('head.php');
    include ('menu.php');
    include ('footer.php');
    include_once ('conexao.php');

?>

<div class="titulo">
    <h1>Quem Somos</h1>
</div>
<div class="text">
    <h5>Somos uma empresa especialista em captura de Papa-Léguas. Segue a foto do nosso mais fiel cliente...</h5>
    <h1><img src="imagens/coyote.png" alt="coyote" class="coyote"></h1>
</div>