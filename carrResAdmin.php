<?php
session_start();

$idRes = $_SESSION['idResposta'];

include "conexao.php";

$comando = $conexao->prepare("SELECT * FROM tb_formulario WHERE id_form = ?");
$comando->bindParam(1, $idRes);

if($comando->execute())
{
    $linha = $comando->fetch(PDO::FETCH_ASSOC);

    echo json_encode($linha, JSON_UNESCAPED_UNICODE);
}
else
{
    echo "<script>exibir_mensagem('Erro ao conectar-se com o Banco!', 'error');</script>";
}
?>