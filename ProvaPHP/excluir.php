<?php
    session_start();
    include_once ('conexao.php');
    
    $id_user = $_GET['idd'];

    $sql = "DELETE FROM tb_usuario WHERE id_user = '{$id_user}'";
    $result_user = mysqli_query($mysqli, $sql);

    if($mysqli->query($sql) === TRUE)
    {
        echo "<script>alert('Registro excluído com sucesso');
        location.href='usuario.php'
       </script>";
    }
    else
    {
        echo "<script>alert('Não foi possível excluir o registro');
        location.href='usuario.php'
       </script>";
    }

?>