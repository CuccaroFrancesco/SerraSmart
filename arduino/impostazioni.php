<?php
if (isset($_POST['millisecondi']) || isset($_POST['temperaturaIdeale']) || isset($_POST['umiditaIdeale']) || isset($_POST['terraIdeale'])) 
{
    $fileContenuto = file_get_contents('output.json');
    $jsonData = json_decode($fileContenuto, true);

    if (isset($_POST['millisecondi'])) {
        $millisecondi = $_POST['millisecondi'];
        $jsonData['millisecondi'] = $millisecondi;
    }

    if (isset($_POST['temperaturaIdeale'])) {
        $temperatura = $_POST['temperaturaIdeale'];
        $jsonData['temperaturaIdeale'] = $temperatura;
    }

    if (isset($_POST['umiditaIdeale'])) {
        $umidita = $_POST['umiditaIdeale'];
        $jsonData['umiditaIdeale'] = $umidita;
    }

    if (isset($_POST['terraIdeale'])) {
        $terra = $_POST['terraIdeale'];
        $jsonData['terraIdeale'] = $terra;
    }

    $newJsonData = json_encode($jsonData);
    file_put_contents('output.json', $newJsonData);
}
?>
