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
<div class="titulo">
    <h1>Produtos em Destaque</h1>
</div>

<?php
    $sql = $mysqli->query("SELECT * FROM tb_img ORDER BY desc_img ASC");

    while($row = $sql->fetch_array()){
?>
<div class="galeria">
    <div class="foto">
        <?php
            echo "<img src='fotos/".$row["nome_img"]."'alt='Foto' class='img_front'/>";
        ?>
        <div class="descricao"><?php echo $row['desc_img'] ?></div>
    </div>
</div>
<?php } ?>