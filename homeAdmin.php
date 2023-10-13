<?php include "PHP/validarSessao.php";?>

<!DOCTYPE html>
<html style="overflow-y: unset;">
<head>

	<!--Compatibilidade de navegadores-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!--Titulo de Aba-->
    <title>Inicio Administração</title>

    <!--Script Javascript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="Javascript/funcoes_javascript.js"></script>
    
    <!--Estilo CSS-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bulma.css"/>


</head>
<body>

    <?php include "Elementos/navbarAdmin.php";?>
    
    <div class="hero-body">
        <div class="container">
            <div class="columns is-gapless box">
                <div class="column">
                    <form id="tabela" method="POST">
                        <div style="width:540px; border: 25px, black; height: 400px; overflow-y: auto;">
                            <table class="table" style='font-size: 12px; margin-left:auto; margin-right:auto;'>
                                <thead>
                                    <tr>
                                        <th><strong> Id</strong></th>
                                        <th><strong> Nome</strong></th>
                                        <th><strong> E-mail</strong></th>
                                        <th><strong> Assunto</strong></th>
                                        <th><strong> Responder</strong></th>
                                    </tr>
                                </thead>
                                <!--Carregando tabelas PHP pelo Ajax-->
                                <tbody id="linhas"> <?php include "PHP/tabelaFeedback.php";?> </tbody>
  
                            </table>
                        </div>
                    
                        
                    </form>
                </div>
                
                <div class="column lay-colunm-center">
                    <p>Selecione<br> o Feedback que deseja responder</p>
                    <img src="image/suportImages/chatImage.png">
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<?php
if(!isset($_POST['responder']));
else
{
    $idRes = $_POST['responder'];
    $_SESSION['idResposta'] = $idRes;
    echo "<script>location.href = 'responderAdmin.php'</script>'";
}
?>