<?php

    Class Usuario{

        private $pdo;
        public $msgerro;

        public function conectar($dbname, $host, $user, $passwd)
        {
            global $pdo;
            try
            {
                $pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$passwd);
            }
            catch(PDOException $e){
                $msgerro = $e->getMessage();
            }
        }

        public function cadastrar($nome, $email, $senha)
        {
            global $pdo;

            $sql = $pdo->prepare("SELECT id_user FROM tb_usuario WHERE email = :u");
            $sql->bindValue(":u",$email);
            $sql->execute();

            if($sql->rowCount() > 0)
            {
                return false;
            }
            else
            {
                $sql = $pdo->prepare("INSERT INTO tb_usuario (nome_user, email, senha)
                VALUES (:n, :u, :s)");
                $sql->bindValue(":n",$nome);
                $sql->bindValue(":u",$email);
                $sql->bindValue(":s",sha1($senha));
                $sql->execute();

                return true;
            }
        }

        public function logar($email, $senha)
        {
            global $pdo;

            $sql = $pdo->prepare("SELECT * FROM tb_usuario WHERE email = :n AND senha = :s");
            $sql->bindValue(":n",$email);
            $sql->bindValue(":s",sha1($senha));
            $sql->execute();

            if($sql->rowCount() > 0)
            {
                $dados = $sql->fetch();
                session_start();
                $_SESSION['id_user'] = $dados['id_user'];
                $_SESSION['nome_user'] = $dados['nome_user'];

                return true;
            }
            else
            {
                return false;
            }
        }
    }
?>