<?php
$servername = "192.185.213.127";
$username = "dombo512_melhores";
$password = "melhores123";
$dbname = "dombo512_dwb";
// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);
// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>