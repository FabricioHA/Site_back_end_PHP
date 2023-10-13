<?php
include "conexao.php";

$comando = $conexao->prepare("SELECT * FROM tb_formulario");


if($comando->execute())
{
    while($Linha = $comando->fetch(PDO::FETCH_OBJ))
    {
        $id = $Linha->id_form;
        $nome = $Linha->nome_form;
        $email = $Linha->email_form;
        $assunto = $Linha->assunto_form;

        
        echo "<tr>";
	    echo "<td>".$id ." </td>";
	    echo "<td>".$nome ." </td>";
	    echo "<td>".$email ."</td>";
	    echo "<td>".$assunto ." </td>";
	    echo "<td><button class='button is-info' value='".$id."' name='responder' id='responder'>Responder</button></td>";
	    echo "</tr>";
    }
}
else
{
    echo "erro ao conectar-se com o Banco de Dados!";
}
?>