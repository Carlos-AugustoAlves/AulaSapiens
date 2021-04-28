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


    require_once 'classes/validadados.php';
    $u = new Usuario;
?>

    <div class="content-fluid">
       <div class="lg_base">
          <div class="logo">
            <img src="imagens/logo.png" alt="logo ACME" class="imglogo">
          </div>
          <div class="tit2">
            <h3>Cadastrar Novo Usuário</h3>
          </div>
          <div class="forlogin">       
            <form method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                </div> 
                <div class="mb-3">
                    <label for="conf_senha" class="form-label">Confirmar a Senha</label>
                    <input type="password" class="form-control" id="conf_senha" name="conf_senha">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Adicionar</button>
                    <a href="usuario.php"><strong>Voltar</strong></a>
                </div>
            </form>

    <?php

        if(isset($_POST['email']))
        {
            $nome               = addslashes($_POST['nome']);
            $email              = addslashes($_POST['email']);
            $senha              = addslashes($_POST['senha']);
            $conf_senha         = addslashes($_POST['conf_senha']);

            if(!empty($email) && !empty($senha))
            {
                $u->conectar("bd_prova","localhost","root","");

                if($u->msgerro == "")
                {
                    if($senha == $conf_senha)
                    {
                        if($u->cadastrar($nome, $email, $senha))
                        { ?>
                            <div class="msg-sucesso">
                                Cadastrado com sucesso
                            </div>
                  <?php }
                        else
                        { ?>
                            <div class="msg-erro">
                               Usuario já cadastrado
                            </div>
                  <?php }
                    }
                    else
                    { ?>
                        <div class="msg-erro">
                            As senhas não conferem
                        </div>
              <?php } 
                }    
            }
            else
            { ?>
                <div class="msg-erro">
               <?php echo "Erro: ".$msgerro;?>
                </div>
       <?php}
        }
        else
        { ?>
            <div class="msg-erro">
                Preencha seus dados
            </div>
  <?php }
    }
  ?>
          </div>
       </div> 
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>