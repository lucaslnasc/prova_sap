<?php
    include ('conexao.php');

    $datav = $_POST['datav'];
    $codRelEqui = $_POST['equipamento'];
    $codRelDef = $_POST['defeito'];
    $hrIni = $_POST['hrIni'];
    $hrFim = $_POST['hrFim'];

    echo $hrIni;
    //echo $_POST['hrFim'];

    $query = $dbh->prepare ('INSERT INTO relatorios_defeito (datav, codRelEqui, codRelDef, hrIni, hrFim)
    VALUES (:datav, :equipamento, :defeito, :hrIni, :hrFim);');

    $query->execute(array(
        ':datav' => $datav,
        ':equipamento' => $codRelEqui,
        ':defeito' => $codRelDef,
        ':hrIni' => $hrIni,
        ':hrFim' => $hrFim 
    ));

    header('Location:telarelatorios.php');
?>