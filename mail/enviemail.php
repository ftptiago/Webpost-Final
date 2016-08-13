<?php 
  require_once('PHPMailer/class.phpmailer.php');

  if($_POST['email'] != null){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $assunto = 'Contato Website'; 
    $mensagem = $_POST['message'];

    $us_email = $_POST['email'];
    $mensagemConcatenada  = 'Assunto: '.$assunto; 
    $mensagemConcatenada .= '<br/> Phone: '.$phone;
    $mensagemConcatenada .= '<br/>Mensagem: <br/>'.$_POST['message'];
    $mensagemConcatenada .= '<br/>-------------------------------'; 

$mail = new PHPMailer();  
$mail->IsSMTP();  // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.meu_servidor_de_email.com.br";
$mail->Port = 465;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "mail@meu_email.com.br"; // SMTP username
$mail->Password = "Password"; // SMTP password 
 
$mail->From     = "mail@meu_email.com.br";
$mail->FromName = "Contato Website";
$mail->AddAddress($us_email); 
$mail->AddCC('mail@meu_email.com.br');
$mail->Subject  = "Resposta automatica";
$mail->Body = $mensagemConcatenada;
/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
  $mail->WordWrap = 50;

if(!$mail->Send()) {
  
  header('Location: ../../index.php?q=0');
    
}else{
  header('Location: ../../index.php?q=1');
}

}

?>
