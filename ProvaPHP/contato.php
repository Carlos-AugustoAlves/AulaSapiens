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

  <div class="container">
    <div class="jumbotron">
        <h3 class="display-5">Caso estiver com alguma duvida ou problema deixe sua mensagem que entraremos em contato com você.</h3>
          <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" id="nome" >
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="assunto">Assunto</label>
            <input type="text" class="form-control" id="assunto">
          </div>
           <div class="form-group">
            <label for="mensagem">Mensagem</label>
            <textarea rows="5" class="form-control" id="mensagem"></textarea>
          </div>
          <button type="enviar" class="btn btn-dark button">Enviar</button>
          <button type="limpar" class="btn btn-dark button">Limpar</button>
          </form>
    </div>
 </div>