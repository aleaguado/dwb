<?php
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];
// algumas variaveis pra guardar os parametros de conexão com o banco
$db_server = 'localhost';
$db_usuario = 'sistema';
$db_senha = '1234';
$db_db = 'login';
//vamos conectar!
$conn = new mysqli($db_server, $db_usuario, $db_senha, $db_db);

// Verificar conexão
if ($conn->connect_error) {
  die("Falha de conexão: " . $conn->connect_error);
}

$sql = "select * from usuario where nome = '" . $login . "' and senha = '" . $senha . "'";

$result = $conn->query($sql);

if($result->num_rows > 0)
{
  $_SESSION['login'] = $login;
  $_SESSION['senha'] = $senha;
  header('location:document.php');
}
else{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  header('location:index.php');
  }
?>