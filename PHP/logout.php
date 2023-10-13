<?php
session_start();
session_destroy();
header("Location: http://localhost/Site_Software_Reconhecimento_De_Gestos/LoginAdmin.html");
?>