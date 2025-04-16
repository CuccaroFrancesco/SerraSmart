<?php
if(isset($_POST['dispositivo']))
{
    $nome = $_POST['dispositivo'];
    $fileContenuto = file_get_contents('output.json');
    
    $jsonData = json_decode($fileContenuto, true);

    if(isset($jsonData[$nome])) 
    {
        $jsonData[$nome] = ($jsonData[$nome] == 0) ? 1 : 0;
    }

    file_put_contents('output.json', json_encode($jsonData));
}
?>
