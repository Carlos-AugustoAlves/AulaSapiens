<?php
    session_start();
    include_once ('conexao.php');

       $id_user         = $_POST['id_user'];
       $nome            = $_POST['nome_user'];
       $email           = $_POST['email'];
       $senha           = sha1($_POST['senha']);
       $conf_senha      = sha1($_POST['conf_senha']);


       if($senha == $conf_senha)
       {
           $sql="UPDATE tb_usuario SET nome_user = '$nome', email = '$email', senha = '$senha' WHERE id_user = {$id_user}";
           $resul_user = mysqli_query($mysqli, $sql);

           if(mysqli_affected_rows($mysqli))
           {
               echo "<script>alert('Registro atualizado com sucesso');
                location.href='usuario.php'
               </script>";
           }
           else
           {
                echo "<script>alert('Não foi possível atualizar!');
                location.href='usuario.php'
                </script>";
           }
       }
       else
       {
        echo "<script>alert('As senha não conferem, não foi possível atualizar!');
        location.href='usuario.php'
        </script>";
       }

 ?>