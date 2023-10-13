<?php

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['assunto']) && isset($_POST['texto']))
{

	$nomeFeedback = $_POST['nome'];
	$emailFeedback = $_POST['email'];
	$assuntoFeedback = $_POST['assunto'];
	$textoFeedback = $_POST['texto'];

	if(!filter_var($emailFeedback, FILTER_VALIDATE_EMAIL)):
		echo "<script>exibir_mensagem('Formato de E-mail inválido!', 'error')</script>";
		exit();
	endif;

	include "conexao.php";

	$comando = $conexao->prepare("INSERT INTO tb_formulario (nome_form, email_form, assunto_form, texto_form) values (?, ?, ?, ?)");
	$comando->bindParam(1, $nomeFeedback);
	$comando->bindParam(2, $emailFeedback);
	$comando->bindParam(3, $assuntoFeedback);
	$comando->bindParam(4, $textoFeedback);
	$comando->execute();
		
	echo "<script>exibir_mensagem('Feedback eviado com Sucesso!', 'success')</script>";
	
}
else
{
	echo "<script>exibir_mensagem('Falha ao Enviar Feedback. Campos preenchidos incorretamente!', 'error')</script>";
}
?>