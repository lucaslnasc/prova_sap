<?php
include('conexao.php');
$query = $dbh->prepare('SELECT * FROM view_relatorios');
$query->execute();

$relatorios = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="estilo_cadastro.css">
    <title>TELA DE RELATORIOS</title>
</head>

<body>
    <header>
        <div class="logozada">
            <a href="http://"><img src="logo.png" alt=""></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="telacadastro.php">Cadastro</a></li>
            </ul>
        </div>
    </header>
    <div class="conteudo-cadastro">
        <article>
            <div class="area-cadastro">
                <h1>Relatórios</h1>
                <table class="table-relatorios">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Equipamento</th>
                            <th>Total de Defeitos</th>
                            <th>Hora de Início</th>
                            <th>Hora Final</th>
                            <th>Tempo Parado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($relatorios as $linha) {
                            echo '<tr>';
                            echo '<td>' . $linha['datav'] . '</td>';
                            echo '<td>' . $linha['tipoEqui'] . '</td>';
                            echo '<td>' . $linha['codRelDef'] . '</td>';
                            echo '<td>' . $linha['hrIni'] . '</td>';
                            echo '<td>' . $linha['hrFim'] . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </article>
    </div>
</body>

</html>