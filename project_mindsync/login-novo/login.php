<?php
// Credenciais do banco de dados 
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "mind_sync";  

// Conectando ao banco de dados MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificando se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo os dados do formulário
    $matricula = $_POST['username'];  
    $senha = $_POST['password'];  

    // Verificando se os campos foram preenchidos
    if (!empty($matricula) && !empty($senha)) {
        $sql = "SELECT * FROM usuarios WHERE matricula = '$matricula' AND senha = '$senha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header("Location: login-novo/test.html");
            exit();
        } else {
            header("Location: error.html");
            exit();
        }
    } else {
        header("Location: error.html");
        exit();
    }
}

// Fechando a conexão com o banco de dados
$conn->close();
?>
