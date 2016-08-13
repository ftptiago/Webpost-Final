<?php include_once 'connect.php';?>
<?php

$user = $_POST['user'];
$senha = md5($_POST['pass']);

$sql = mysql_query("SELECT * FROM login WHERE us_nome = '".mysql_real_escape_string($user)."' AND us_pass = '".mysql_real_escape_string($senha)."'",$con)or die (mysql_error());
$registro = mysql_num_rows($sql);

if($registro<1){
     echo "<script>if(window.confirm('Campo Usuário ou Senha incorretos! \\ Tente novamente!')) { window.location='index.php';} else { window.close () } </script>";
        
}else{
    session_start();
    $_SESSION['nome_usuario']=$user;
    $_SESSION['senha_usuario']=$senha;
    header("Location: admin.php");
}
mysql_close($con);
?>