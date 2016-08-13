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
$nome  = $_POST['co_nome'];
$link1 = $_POST['co_link1'];
$link2 = $_POST['co_link2'];
$link3 = $_POST['co_link3'];
$desc = $_POST['co_desc'];



    if ($nome != NULL && $link1 != NULL && $desc != NULL) { 
        
        if (!file_exists($_FILES['arquivo']['name'])) {		
			
			$pt_file =  'posts/'.$_FILES['arquivo']['name'];
			
			if ($pt_file != 'posts/'){	
				
				$destino =  '../posts/'.$_FILES['arquivo']['name'];				
				$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
				move_uploaded_file($arquivo_tmp, $destino);
				chmod ($destino, 0644);	
				
			}elseif($_POST['valor'] != NULL){
				
				$arq = explode('../', $_POST['valor']);
				$pt_file = $arq[1];	
			
				}
			}
    
        $insert = mysql_query("INSERT INTO `confsite`(`co_id`, `co_nome`, `co_link1`, `co_link2`, `co_link3`, `co_img`, `co_desc`)VALUES (NULL, '" .$nome. "', '" .$link1. "', '" .$link2. "', '" .$link3. "', '" .$pt_file. "', '" . $desc . "')",$con)or die(mysql_error());
        mysql_insert_id();
        
        if ($insert) {
            mysql_close($con); 
            echo "<script>if(window.confirm('Cadastrado com sucesso!')) { window.location='admin.php';} else { window.close () } </script>";
        }
    } else {
        echo "<script>if(window.confirm('Campo Nome, Link ou Descrição incorretos! \\ Tente novamente!')) { window.location='admin.php';} else { window.close () } </script>";
    }

