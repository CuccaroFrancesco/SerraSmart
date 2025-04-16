<?php
include('../app/config.php');

if(isset($_POST['temperature']) && isset($_POST['humidity']) && isset($_POST['acqua']) && isset($_POST['terra']))
{
    $temp=$_POST['temperature'];
    $umid=$_POST['humidity'];
    if($umid>=100)
        $umid=100;
    $terra=$_POST['terra'];
    if($terra>=100)
        $terra=100;
    $acqua=$_POST['acqua'];
    if($acqua>=100)
        $acqua=100;
    $sql="INSERT INTO tabDati(data,temp,umidita,terra,acqua) VALUES (now(),'$temp','$umid','$terra','$acqua')";
    $result=mysqli_query($connessione,$sql);
    echo $connessione->error;
}
?>