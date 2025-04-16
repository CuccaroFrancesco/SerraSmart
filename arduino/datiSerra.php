<?php
    include('../app/config.php');
    include('../login/classeUtente.php');
    $sql = "SELECT * FROM tabDati ORDER BY data DESC LIMIT 1";
    $result = $connessione->query($sql);
    $riga = $result->fetch_assoc();
    $fileContenuto = file_get_contents('output.json');
    $jsonData = json_decode($fileContenuto, true);
    foreach($riga as $key => $value)
    {
        $jsonData[$key]=$value;
    }
    $newJsonData = json_encode($jsonData);
    file_put_contents('output.json', $newJsonData);
    echo $newJsonData;
    header('Content-Type: application/json');
?>
