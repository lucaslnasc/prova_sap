<?php
include('conexao.php');

if (isset($_POST['login']) || isset($_POST['senha'])) {

    if (strlen($_POST['login']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    }
}


$query = $dbh->prepare("SELECT * FROM login WHERE login = 'login' AND senha = 'senha'");
$query->execute();

$tablelogin = $query->fetchALL();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="estilo.css">
    <title>TELA DE LOGIN</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="http://"><img src="logo.png" alt=""></a>
        </div>
    </header>
    <div class="main">
        <form action="login.php" method="post">
            <div class="tela-login">
                <h1>Login</h1>
                <input type="text" placeholder="Nome ou Email" id="campo" name="login">
                <br><br>
                <input type="password" placeholder="Senha" name="senha">
                <br><br>
                <input type="submit" value="Entrar">
            </div>
        </form>
    </div>
</body>
</html>