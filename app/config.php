<?php
$server='localhost';
$username='serrasmart';
$password='';
$db='my_serrasmart';
$connessione=new mysqli($server,$username,$password,$db);
if($connessione->connect_error)
{
	die("Errore di connessione (".$connessione->connect_errno.") ".$connessione->connect_error);
}

?>