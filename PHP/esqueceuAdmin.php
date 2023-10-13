<?php
if(isset($_POST['email']))
{
	session_start();

	include "conexao.php";

	$emailAdmin = $_POST['email'];

	$comando = $conexao->prepare("SELECT * FROM tb_login_admin WHERE usuario_admin=?");
	$comando->bindParam(1, $emailAdmin);
	
	if($comando->execute())
	{
		while ($linha = $comando->fetch(PDO::FETCH_OBJ))
		{	
			$emaiAdmin = $linha->usuario_admin;
			$senhaAdmin = $linha->senha_admin;
		}
		
		require_once("phpmailer/class.phpmailer.php");

		include "SenhaEmail.php";//Dados do E-mail que irá responder o usuário

		$enviarPara = $emailAdmin; //E-mail Que irá receber a resposta

		$enviarDe = "softrecgestos@gmail.com";//E-mail origem da mensagem
		$nomeDe = "Equipe SRG"; //Nome do E-mail origem da mensagem
		$assunto = utf8_decode("Recuperação de Senha"); //Assunto da mensagem
		$mensagem = "Sua senha: ". $senhaAdmin;

		$error;
		$mail = new PHPMailer();//Iniciando o PHPMailer
		$mail->isSMTP();//Ativar SMTP
		$mail->SMTPDebug = 0;//Debugar erros
		$mail->SMTPAuth = true;//Autenticação ativada
		$mail->SMTPSecure = 'ssl';//Padrão de segurança
		$mail->Host = 'smtp.gmail.com';//SMTP utilizado
		$mail->Port = 465;//A porta 465 deverá estar aberta em seu servidor
		$mail->Username = USER;
		$mail->Password = PWD;
		$mail->SetFrom($enviarDe, $nomeDe);
		$mail->Subject = $assunto;
		$mail->Body = "Usuário: " .$emaiAdmin.", \n\n". $mensagem;
		$mail->AddAddress($enviarPara);

		if($mail->Send())
		{
			echo "1";
		}
		else
		{
			$error = $mail->ErrorInfo;
			echo $error; //Emite possível erro no envio da mensagem ao destinatário
		}
		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
	}
	else
	{
		echo "0";
	}
}
?>