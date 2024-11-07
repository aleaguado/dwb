<?php
session_start(); // Inicia os trabalhos com sessão
require_once 'db_conn.php'; // Inclui a conexão com o banco
include('msg.php'); // Inclui o arquivo que mostra mensagens
if (isset($_GET['prontuario'])) {
    $_SESSAO['pront_veio'] = $_GET['prontuario'];
}
if ($_SERVER["REQUEST_METHOD"] === "POST") { //verifica se será chamado via método post
    $prontuario = $_POST["prontuario"]; //pega a variável prontuario q vem via POST
    $nome = $_POST["nome"]; //pega a variavel nome que vem via POST
    $pront_veio = $_SESSAO['pront_veio'];
    $sql = "UPDATE gente set prontuario = '$prontuario', nome = '$nome' where prontuario='$pront_veio'";
    if ($conn->query($sql) === TRUE) { // Executa o insert e verifica!
        $_SESSION['message'] = "Pessoa atualizada com sucesso!"; //Cria a mensagem!
        header("Location: index.php"); //Chama o index!
        exit(0);
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    $conn->close(); //Fecha a conexão com o banco
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Vamos usar o BootStrap para pegar alguns estilos prontos? -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Inserindo gente!</title>
</head>
<body>
<!-- Essas classes do CSS são todas do bootstrap!-->
<div class="container mt-5">
        <!-- O bootstrap organiza o layout em linhas (row) e colunas (col)-->
                <div class="card">
                    <div class="card-header">
                        <h4>Atualizar pessoa
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Vamos omitir o  action porque queremos que o formulário chame ele mesmo!-->
                        <form method="POST">
                            <div class="mb-3">
                                <label>Prontuario</label>
                                <input type="text" name="prontuario" value=<?=$_GET['prontuario']?> class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value=<?=$_GET['nome']?> class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="atualizar_pessoa" class="btn btn-primary">Atualizar pessoa</button>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>