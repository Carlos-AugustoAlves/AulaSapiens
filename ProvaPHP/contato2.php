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