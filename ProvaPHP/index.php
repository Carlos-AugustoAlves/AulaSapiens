<?php
  include ("head.php");
  include ("footer.php");
  include_once ("conexao.php");

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="imagens/logo.png" alt="logo" width="50%"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="info.php">Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contato.php">Contato</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cadastrar
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="usuario.php">Usuários</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="cad_imagem.php">Imagens</a></li>
            </ul>
          </li> 
          <div class="btn-login">
            <a href="login.php">
              <button type="button" class="btn btn-secondary">Login</button>
            </a>
          </div>
      </div>
    </div>
  </nav>


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