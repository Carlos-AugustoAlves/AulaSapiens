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

<div class="tit">
    <h3>Usuarios cadastrados no sistema</h3>
</div>

<div class="adduser">
    <a href="cad_user.php">
    <button type="button" class="btn  btn-dark">Adicionar Usuário</button>
    </a>
</div>

<div class="search">
    <form action="#" method="POST" class="row g-3">
        <div class="col-auto">
            <label for="busca" class="visuality-hidden desc">Localizar</label>
            <input type="text" class="form-control" id="busca" name="busca" placeholder="Localizar">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn-dark mb-3" name="buscar">Buscar</button>
        </div>    
    </form>
</div>
<div class="tab_user">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" width="30%">Nome</th>
                <th scope="col" width="30%">Email</th>
                <th scope="col" width="20%">Senha</th>
                <th scope="col" width="20%" colspan="2">Ação</th>
            </tr>
        </thead>
    </table>
</div>

<?php
    $busca = $_POST['busca'];

    $results = $mysqli->query("SELECT * FROM tb_usuario WHERE nome_user LIKE '%$busca%' ORDER BY nome_user ASC");

    print '<table border="0" class="table">';

    while($row = $results->fetch_array()) {

        $id = $row["id_user"];
        print '<tr>';
        print '<td width="30%">'.$row["nome_user"].'</td>';
        print '<td width="30%">'.$row["email"].'</td>';
        print '<td width="20%">******</td>';
        print '<td width="20%">
                                <a href="editar.php?ide='.$row["id_user"].'">Editar |</a>
                                <a href="excluir.php?idd='.$row["id_user"].'"> Excluir</a>
            </td>';
            print '</tr>';  
    }
    print '</table>';
?>
<div class="table">
<?php
    echo 'Registros Encontrados: '.$results->num_rows;

    $results->free();
    $mysqli->close();

?>
</div>