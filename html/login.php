<?php

    include('conexao.php');

    if (isset($_POST['login'], $_POST['senha']) && $_POST['login'] != '' & $_POST['senha'] != '') {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
    }else{
        echo 'variavies não definidas';
        die();
    }

    try{

        $query = $dbh->prepare('SELECT login, senha FROM login WHERE login = :login AND senha = :senha');

        $query->execute(array(
            ':login' => $login,
            ':senha' => $senha
        ));

        $usuario = $query->fetch();
        print_r($usuario);

        if(isset($usuario['login'])){
            header('Location:cadastro.php');
        }else{
            echo 'Falha login!';
            die();
        }
       
    }catch(PDOException $e){
        echo 'erro';
    }
?>