<?php
    include_once ("conexao.php");

    if(isset($_POST['cadastrar']))
    {
        $foto       = $_FILES['foto'];
        $desc_img   = $_POST['desc_imagem'];

        if(!empty($foto["name"]))
        {
            $largura    = 200;
            $altura     = 280;
            $tamanho    = 17000;
            $error      = array();

            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/",$foto['type']))
            {
                $error[1] = "Isso não é uma imagem.";
            }
            $dimensoes = getimagesize($foto["tmp_name"]);

            if($dimensoes[0] > $largura)
            {
                $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
            }
            if($dimensoes[1] > $altura)
            {
                $error[3] = "A altura da imagem não deve ultrapassar ".$altura." pixels";
            }
            if($foto["size"] > $tamanho)
            {
                $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
            }
            if(count($error) == 0)
            {
                preg_match("/\.(gif|bmp|jpg|jpeg|jpg|png){1}$/i", $foto["name"], $ext);

                $nome_imagem = md5(uniqid(time())).".".$ext[1];
                $caminho_imagem = "fotos/".$nome_imagem;
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);

                $sql = "INSERT INTO tb_img VALUE (null, '$nome_imagem', '$desc_img')";
                $results_img = mysqli_query($mysqli, $sql);

                if($results_img)
                {
                    header("Location: cad_imagem.php");
                }
            }
            
            if(count($error) != 0)
            {
                foreach ($error as $erro){
                    echo $erro."<br />";
                }
            }
        }
    }
?>