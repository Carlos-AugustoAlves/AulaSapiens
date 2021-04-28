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
    include_once ('conexao.php');
 ?>

 <?php
    $id = $_GET['ide'];

    $results = $mysqli->query("SELECT * FROM tb_usuario WHERE id_user = '{$id}'");

    while($row = $results->fetch_array()){
        $id_user    = $row['id_user'];
        $nome       = $row['nome_user'];
        $email      = $row['email'];
        $senha      = $row['senha'];
    }
 ?>

 <div class="content-fluid">
    <div class="lg_base">
        <div class="logo">
            <img src="imagens/logo.png" alt="logo Sapiens" class="imglogo">
        </div>
        <div class="tit">
            <h3>Editar dados do Usuário</h3>
        </div>
        <div class="forlogin">
            <form action="update.php" method="POST">
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user; ?>">
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Usuário</label>
                    <input type="text" class="form-control" id="nome_user" required name="nome_user" value="<?php echo $nome; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" required name="email" value="<?php echo $email; ?>">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" required name="senha" placeholder="******">
                </div>
                <div class="mb-3">
                    <label for="conf_senha" class="form-label">Confirmar a Senha</label>
                    <input type="password" class="form-control" id="conf_senha" required name="conf_senha" placeholder="******">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="atualizar" class="btn btn-primary">Atualizar</button>
                    <a href="usuario.php">Voltar</a>
                </div>
            </form>
        </div>
    </div>
 </div>