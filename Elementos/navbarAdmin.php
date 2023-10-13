<?php
if(!isset($_SESSION['emailAdmin']) == false)
{
?>
<!--Inicio Navbar-->
<nav class="navbar is-black" role="navigation" aria-label="main navigation">
	<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
       	<span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
    </a>
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="homeAdmin.php">
                Inicio
            </a>
        </div>
        <div class="navbar-item is-centered" style="color: #fff">
        	<?php
			$emailAdmin = $_SESSION['emailAdmin'];
			echo "Usuário Logado: ".$emailAdmin;
        	?>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <a class="button is-primary" href="PHP/logout.php">
                    <strong>Sair</strong>
                </a>
            </div>
        </div>
    </div>
</nav>
<!--Fim Navbar-->
<?php
}
else
{
	echo "<script>location.href = 'http://localhost/Site_Software_Reconhecimento_De_Gestos/LoginAdmin.html';</script>";
}
?>