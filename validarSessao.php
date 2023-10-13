<?php
session_start();

if(!isset($_SESSION['logado']) && !isset($_SESSION['logado']) == 'logado')
{
    session_destroy();
    header("location: http://localhost/Site_Software_Reconhecimento_De_Gestos/loginAdmin.html");
}else;
?>