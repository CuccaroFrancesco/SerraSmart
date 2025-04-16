<?php
if(isset($_POST['temperaturaIdeale']))
{
    $temperatura = $_POST['temperaturaIdeale'];
    unset($_POST['temperaturaIdeale']);
    $fileContenuto = file_get_contents('output.json');
    $jsonData = json_decode($fileContenuto, true);
    $jsonData['temperaturaIdeale'] = $temperatura;
    file_put_contents('output.json', json_encode($jsonData));
}
if(isset($_POST['umiditaIdeale']))
{
    $umidita = $_POST['umiditaIdeale'];
    unset($_POST['umiditaIdeale']);
    $fileContenuto = file_get_contents('output.json');
    $jsonData = json_decode($fileContenuto, true);
    $jsonData['umiditaIdeale'] = $umidita;
    file_put_contents('output.json', json_encode($jsonData));
}
if(isset($_POST['terraIdeale']))
{
    $terra = $_POST['terraIdeale'];
    unset($_POST['terraIdeale']);
    $fileContenuto = file_get_contents('output.json');
    $jsonData = json_decode($fileContenuto, true);
    $jsonData['terraIdeale'] = $terra;
    file_put_contents('output.json', json_encode($jsonData));
}
?>
