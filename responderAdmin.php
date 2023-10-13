<?php
if(isset($_POST['resposta']))
{
    session_start();
    if(isset($_SESSION['idResposta']))
    {
        include "conexao.php";
        

        $idFeed = $_SESSION['idResposta'];
        $respostaAdmin = $_POST['resposta'];

        $comando = $conexao->prepare("UPDATE tb_formulario SET resp_contato = ? WHERE id_form = ?");
        $comando->bindParam(1, $respostaAdmin);
        $comando->bindParam(2, $idFeed);
        $comando->execute();

        include "envEmailAdmin.php";
    }
    else 
    {
        echo "<script>exibir_mensagem('Erro ao carregar a sessão!', 'error')</script>";
    }

}
else
{
	echo "<script>exibir_mensagem('Erro ao enviar resposta!', 'error')</script>";
}
?>