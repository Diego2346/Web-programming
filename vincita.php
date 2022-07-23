<?php
$nome=$_GET['nome'];
$cognome=$_GET['cognome'];
$email=$_GET['email'];
$codice=$_GET['codice'];
echo "Complimenti &nbsp".$nome."<br>";
echo "Con quest dati potrai ricevere lo sconto:<br>";
echo "Nome: &nbsp".$nome."<br>";
echo "Cognome: &nbsp".$cognome."<br>";
echo "Email: &nbsp".$email."<br>";
echo "Codice: &nbsp".$codice;
?>