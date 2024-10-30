<?php
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];

if(( $login == 'php' ) && ( $senha == 'php' ))
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