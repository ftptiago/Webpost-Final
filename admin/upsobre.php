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
$id = $_POST['id'];
$titulo  = mysql_real_escape_string($_POST['titulo']);
$texto1 = mysql_real_escape_string($_POST['texto1']);
$texto2 = mysql_real_escape_string($_POST['texto2']);



    if ($titulo != NULL && $texto1 != NULL && $texto2 != NULL) {
        
        $insert = mysql_query("UPDATE `sobre` SET `titulo` = '$titulo', `texto1` = '$texto1', `texto2`= '$texto2' WHERE `id` = '$id'",$con)or die(mysql_error());
        mysql_insert_id();
        
        if ($insert) {
            mysql_close($con); 
            echo "<script>if(window.confirm('Atualizado com sucesso!')) { window.location='admin.php';} else { window.close () } </script>";
        }
    } else {
        echo "<script>if(window.confirm('Campos incorretos! \\ Tente novamente!')) { window.location='admin.php';} else { window.close () } </script>";
    }

