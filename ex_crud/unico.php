<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Cria a conexão
    $conn = new mysqli("192.185.213.127", "dombo512_melhores", "melhores123", "dombo512_dwb");
    // Verifica a conexão
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $prontuario = $_POST["prontuario"]; //pega a variável prontuario q vem via POST
    $nome = $_POST["nome"]; //pega a variavel nome que vem via POST
    $sql = "INSERT INTO gente (prontuario, nome) VALUES ('$prontuario', '$nome')"; //Cria o insert!
    if ($conn->query($sql) === TRUE) { // Executa o insert e verifica!
        header("Location: unico.php"); //Chama o index!
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
    <title>Inserindo gente!</title>
</head>
<body>
    <form method="POST">
        <label>Prontuario</label>
        <input type="text" name="prontuario">
        <label>Nome</label>
        <input type="text" name="nome">
        <button type="submit" name="salvar_pessoa">Salvar pessoa</button>
    </form> 
</body>
</html>