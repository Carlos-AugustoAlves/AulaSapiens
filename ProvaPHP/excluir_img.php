<?php
    session_start();
    include_once ("conexao.php");

    $id = $_GET['idd'];

    $consult_img = $mysqli->query("SELECT * FROM tb_img WHERE id_img = {$id}");

    while($row = $consult_img->fetch_array())
    {
        $id_img = $row['id_img'];
        $nome_img = $row['nome_img'];
    }

    $arquivo = "fotos/".$nome_img;

    if($id_img == $id)
    {
        unlink($arquivo);

        $sql = "DELETE FROM tb_img WHERE id_img = {$id}";
        $result_user = mysqli_query($mysqli, $sql);

        if($mysqli->query($sql) === TRUE)
        {
            echo "<script>alert('Registro excluido com sucesso');
            location.href='cad_imagem.php'
            </script>";
        }
        else
        {
            echo "<script>alert('Não foi possível excluir o registro');
            location.href='cad_imagem.php'
            </script>";
        }
    }
    else
    {
        echo "<script>alert('Não foi possível excluir o registro e apagar o arquivo');
        location.href='cad_imagem.php'
        </script>";
    }
?>