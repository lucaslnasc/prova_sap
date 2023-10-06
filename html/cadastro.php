<?php
include('conexao.php');

$query = $dbh->prepare('SELECT * FROM equipamento');
$query->execute();

$equipamento = $query->fetchAll();

$query = $dbh->prepare('SELECT * FROM defeitos');
$query->execute();

$defeitos = $query->fetchAll();

?>

<!DOCTYPE html>
<html>

<head lang="pt-BR">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../CSS/estilo_cadastro.css">
    <title>Login</title>
</head>

<body>
    <form action="cadastrarBD.php" method="post"></form>
    <header>
        <div class="logo">
            <a href="http://"><img src="../IMG/logo.png" alt=""></a>
        </div>
        <div class="espacamento">

        </div>
        <div class="menu">
            <ul>
                <li><a href="telarelatorios.html">Relatorios</a>
                </li>
            </ul>
        </div>
    </header>
    <div class="conteudo-cadastro">
        <article>
            <div class="area-cadastro">
                <form action="cadastrarBD.php" method="post">
                    <div class="input-box">
                        <label for="data">Data</label>
                        <input id="datav" type="datetime-local" name="datav" required>
                    </div>

                    <div class="input-group">

                        <div class="input-box">
                            <label for="seleciona_equi">Equipamento</label>
                            <select name="equipamento" id="equipamento">
                                <?php
                                foreach ($equipamento as $linha) {
                                    echo '<option value ="' . $linha['codEqui'] . '">' . $linha['tipoEqui'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                            <div class="input-box">
                            <label for="hora_inicial">Horário Início defeito</label>
                            <input id="hrIni" type="datetime-local" name="hrIni" required>
                        </div>

                        <div class="input-box">
                            <label for="seleciona_equi">Tipo Defeito</label>
                            <select name="defeito" id="defeito">
                                <?php
                                foreach ($defeitos as $def) {
                                    echo '<option value ="' . $def['codDef'] . '">' . $def['tipoDef'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-box">
                            <label for="hora_fianl">Horário Final Defeito</label>
                            <input id="hrFim" type="datetime-local" name="hrFim" required>
                        </div>
                    </div>
                    <div class="button">
                        <div class="cor">
                            <input type="submit" value="Salvar">
                        </div>
                        <input type="submit" value="Limpar">
                    </div>
                </form>
            </div>
        </article>
    </div>
</body>