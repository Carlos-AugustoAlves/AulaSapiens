<?php
    session_start();
    if(!isset($_SESSION['id_user']))
    {
        echo "<script>alert('Acesso restrito. Faça Login!');
            location.href='index.php'
            </script>";
    }

    include ("head.php");
    include ("menu.php");
    include ("footer.php");
    include_once ("conexao.php");
?>

<div class="tit">
    <h1>Cadastrar Imagens</h1>
</div>

<div class="cadimg">
    <form action="save_img.php" method="POST" enctype="multipart/form-data">
        <label for="up_img" class="form-label labelup desc">Carregar Imagem</label>
        <input type="file" class="form-control" name="foto">
        <label for="desc_img" class="form-label labelup desc">Descrição da Imagem</label>
        <input type="text" class="form-control" name="desc_imagem">
        <p class="desc">tamanho do arquivo ou foto deve ser 280x180px</p>

        <input type="submit" class="btn btn-secondary btn-enviar" value="salvar" name="cadastrar">
    </form>
</div>

<hr>

<div class="table table_img">
    <form action="#" method="GET">
        <table class="table">
            <tr>
                <th class="desc">Id</th>
                <th class="desc">Nome da Imagem</th>
                <th class="desc">Nome do Arquivo</th>
                <th class="desc">Ação</th>
            </tr>
            <tr>
            <?php
                    $sql = $mysqli->query("SELECT * FROM tb_img ORDER BY desc_img ASC");

                    while($row = $sql->fetch_array()){
                        print  "<td width='5'>".$row["id_img"]."</td>";
                        print  "<td width='40%'>".$row["desc_img"]."</td>";
                        print  "<td width='40%'><img class='imgtr' src='fotos/".$row["nome_img"]."' alt='".$row["desc_img"]."'</td>";
                        print  '<td width="5">
                                <a href="excluir_img.php?idd='.$row["id_img"].'">Excluir</a>
                                </td>';
                        print'<tr>';
                    }
                ?>
            </tr>
        </table>
    </form>
</div>