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

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap Admin</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
    <body>
        <nav class="navbar navbar-default">
       
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Administrador</a>
            </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav navbar-left">
                    <li class="page-scroll">
                        <?php echo"<a href=\"admin.php\">Início</a>";?>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <?php echo"<a href=\"sair.php\">Sair</a>";?>
                    </li>
                </ul>
             </div>        

          </nav>
            <div class="container">
                
                <?php
        
        echo "<br><a href=\"caduser.php\">Cadastro de Novos Usuários!</a>";
        echo "<br><a href=\"confsite.php\">Cadastrar configurações</a>";
         echo "<br><a href=\"upconfsite.php\">Alterar configurações</a>";
         echo "<br><a href=\"cadimagem.php\">Cadastrar Portfolio</a>";
         echo "<br><a href=\"listimagem.php\">Atualizar Portfolio</a>";
         echo "<br><a href=\"cadsobre.php\">Cadastrar Sobre</a>";
         echo "<br><a href=\"updatesobre.php?id=1\">Atualizar Sobre</a>";
        ?>
            </div>
           
            
        
        <!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    </body>
</html>
