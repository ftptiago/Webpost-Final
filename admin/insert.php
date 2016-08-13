<?php include_once 'connect.php';?>
<?php
session_start();
if (isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario'];
}
if (isset($_SESSION['senha_usuario'])) {
    $senha_usuario = $_SESSION['senha_usuario'];
} else {
    
}
if (!(empty($nome_usuario)OR empty($senha_usuario))) {
    
    $sql = mysql_query("SELECT * FROM login WHERE us_nome = '" . mysql_real_escape_string($nome_usuario) . "'AND us_pass = '" . mysql_real_escape_string($senha_usuario) . "'", $con)or die(mysql_error());
    $conta = mysql_num_rows($sql);
    if ($conta >= 1) {
        if (($senha_usuario != mysql_result($sql, 0, "us_pass"))) {
            unset($_SESSION['nome_usuario']);
            unset($_SESSION['senha_usuario']);
            header("Location: index.php");
            
            exit;
        }
    } else {
        unset($_SESSION['nome_usuario']);
        unset($_SESSION['senha_usuario']);
        header("Location: index.php");
        exit;
    }
} else {
    
    header("Location: index.php");
}
?>
    <?php

/* @var $user type */
$user  = $_POST['user'];
$email = $_POST['email'];
$regra = $_POST['regra'];
$senha = $_POST['pass'];
$chave = $_POST['gerarchave'];

if ($regra === $chave) {
    if ($user != NULL && $email != NULL && $senha != NULL) {
        $today = md5(date("d m y G:i:s T Y"));
    
        $insert = mysql_query("INSERT INTO `login`(`us_id`, `us_nome`, `us_email`, `us_pass`, `us_chave`)VALUES (NULL, '" .$user. "', '" .$email. "', '" . md5($senha) . "', '" . $today . "')",$con)or die(mysql_error());
        mysql_insert_id();
        
        if ($insert) {
            mysql_close($con); 
            echo "<script>if(window.confirm('Usuário cadastrado com sucesso!')) { window.location='admin.php';} else { window.close () } </script>";
        }
    } else {
        echo "<script>if(window.confirm('Campo Nome, E-mail ou Senha incorretos! \\ Tente novamente!')) { window.location='admin.php';} else { window.close () } </script>";
    }
} else {
    echo "<script>if(window.confirm('Campo Validador incorreto! \\ Tente novamente!')) { window.location='admin.php';} else { window.close () } </script>";
}
