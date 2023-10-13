<?php
//Definindo variáveis
header('Content-type: text/html; charset=utf-8');
$nomeForm;
$emailForm;
$assuntoForm;
$respForm;

$consulta = $conexao->prepare("SELECT * FROM tb_formulario WHERE id_form = ?");
$consulta->bindParam(1, $idFeed);

if($consulta->execute())
{
    while($linha = $consulta->fetch(PDO::FETCH_OBJ))
    {
        $nomeForm = $linha->nome_form;
        $emailForm = $linha->email_form;
        $assuntoForm = $linha->assunto_form;
        $respForm = $linha->resp_contato;
    }
    require_once("phpmailer/class.phpmailer.php");

    include "SenhaEmail.php";//Dados do E-mail que irá responder o usuário

    $enviarPara = $emailForm; //E-mail Que irá receber a resposta

    $enviarDe = "softrecgestos@gmail.com";//E-mail origem da mensagem
    $nomeDe = "Equipe SRG"; //Nome do E-mail origem da mensagem
    $assunto = $assuntoForm; //Assunto da mensagem
    $mensagem = $respForm;

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
    $mail->Subject = "Assunto de seu Feedback: " . $assunto;
    $mail->Body = "Olá " .$nomeForm.", \n\n". $mensagem;
    $mail->AddAddress($enviarPara);

    if($mail->Send())
    {
        echo "<script>exibir_mensagem('Resposta enviada com Sucesso!', 'success')</script>"; //Confirma o sucesso do Envio da Mensagem
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
	echo "<script> exibir_mensagem('Erro ao carregar dados para o envio de E-mail!', 'error')</script>";
}


?>