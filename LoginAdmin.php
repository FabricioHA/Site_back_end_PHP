<?php

if(isset($_POST['email']) && isset($_POST['senha']))
{
	session_start();

	include "conexao.php";

	$emailLogin = $_POST['email'];
	$senhaLogin = $_POST['senha'];

	$comando = $conexao->prepare("SELECT * FROM tb_login_admin WHERE usuario_admin=? && senha_admin=?");
	$comando->bindParam(1, $emailLogin);
	$comando->bindParam(2, $senhaLogin);
	
	if($comando->execute())
	{
		while ($Linha = $comando->fetch(PDO::FETCH_OBJ))
		{
			$idAdmin = $Linha->id_admin;
			$emaiAdmin = $Linha->usuario_admin;
		}
		if(!$idAdmin == null && !$emaiAdmin == null)
		{
			$_SESSION['idLogin'] = $idAdmin;
			$_SESSION['emailAdmin'] = $emaiAdmin;
			$_SESSION['logado']='logado';
			echo "1";
		}
	}
	else
	{
		echo "0";
	}
}
?>