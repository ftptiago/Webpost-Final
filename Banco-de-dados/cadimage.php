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
		<title>Admin - Criar novo Usuário</title>
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
        // put your code here
        ?><div class="row well col-lg-4">
        <form class="form col-md-12 center-block" enctype="multipart/form-data" action="insertimage.php" method="POST">
               
                    <input type="text" name="titulo" class="form-control input-lg" placeholder="Titulo">
                <br/>
               
                    <input type="text" name="url" class="form-control input-lg" placeholder="Url">
                              <br/>               
               <input id="arquivo" name="arquivo" type="file" class="form-control input-lg" placeholder="Imagem">
                             
                <br/>
                <button class="btn btn-primary" type="submit">Cadastrar</button>            
            </form>
        </div>
            </div>
        
        <!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    </body>
</html>
