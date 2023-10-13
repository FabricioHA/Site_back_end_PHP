<?php include "PHP/validarSessao.php";?>

<!DOCTYPE html>
<html style="overflow-y: unset;">
<head>

	<!--Compatibilidade de navegadores-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!--Titulo de Aba-->
    <title>Responder Feedback</title>

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
            <div class="columns box">
                <div class="column is-left">
                    <div class="box" style="background-color: #bdbdbd;">
                        <div class="field grey-box">
                            <p><strong>ID </strong></p>
                            <div id="idFeed"></div>                                    
                        </div>

                        <div class="field" style="max-width: auto;">
                            <p><strong>Nome </strong></p>
                            <div id="nomeFeed"></div>                                    
                        </div>

                        <div class="field grey-box">
                            <p><strong>E-mail </strong></p>
                            <div id="emailFeed"></div>                                    
                        </div>

                        <div class="field">
                            <p><strong>Assunto </strong></p>
                            <div id="assuntoFeed"></div>                                    
                        </div>

                        <div class="field grey-box ajustar-res" style="height: 122.5px;">
                            <div class="ajustar-res">
                                <p><strong>Mensagem </strong></p>
                                <p id="textoFeed"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-right lay-colunm-center">
                    <p class="subtitle is-4">Resposta ao Feedback:</p>
                    <br>

                    <form id="enviarResposta" method="POST">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" disabled="true" id="resposta" name="resposta" style="resize: none; height: 200px;"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="columns">
                            <div class="column is-offset-4">
                                <!--Componente Botão Enviar-->
                                <button class="button is-link" disabled="true" id="enviar" name="enviar">Enviar</button>
                                
                                <!--Componente Botão Limpar-->
                                <button class="button is-link" disabled="true" id="limpar" name="limpar">Limpar</button>
                            </div>
                        </div>
                        <div id="resultado"></div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function()
        {
            $.ajax(
            {
                url: 'PHP/carrResAdmin.php',
                dataType: 'json',
    
                success:function(dados)
                {
                    $("#idFeed").html(dados.id_form);
                    $("#nomeFeed").html(dados.nome_form);
                    $("#emailFeed").html(dados.email_form);
                    $("#assuntoFeed").html(dados.assunto_form);
                    $("#textoFeed").html(dados.texto_form);
    
                    if(dados.resp_contato)
                    {
                        document.getElementById('resposta').disabled = true;
                        document.getElementById('enviar').disabled = true;
                        document.getElementById('limpar').disabled = true;
                        $("#resposta").html(dados.resp_contato);
                    }
                    else
                    {
                        document.getElementById('resposta').disabled = false;
                        document.getElementById('enviar').disabled = false;
                        document.getElementById('limpar').disabled = false;
                    }
                },
                error:function()
                {
                    exibir_mensagem('erro ao carregar dados!', 'error');
                }
            })
            return false;
        });
        $(document).ready(function()
        {
            $('#enviar').click(function() 
            {
                var dadosform = $('#enviarResposta').serialize();
         
                $.ajax(
                {
                    method: 'POST',
                    url: 'PHP/responderAdmin.php',
                    data: dadosform,
    
                    beforeSend: function() 
                    {
                        document.getElementById('enviar').className = "button is-link is-loading";
                        document.getElementById('resposta').disabled = true;
                        document.getElementById('enviar').disabled = true;
                        document.getElementById('limpar').disabled = true;
                    }
                })
    
                .done(function(msg)
                {
                    document.getElementById('enviar').className = "button is-link";
                    $("#resultado").html(msg);
                })
    
                .fail(function()
                {
                    $("#resultado").html(document.getElementById('enviar').className = "button is-link");
                    exibir_mensagem("Erro ao conectar-se com o banco!", "error");
                })
    
                return false;
            });
        });
    </script>
</body>
</html>