<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Seguro: Log In</title>
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <script type="text/JavaScript" src="js/sha512.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error en el Inicio de Sesion!</p>';
        }
        ?> 
        <form action="includes/process_login.php" method="post" name="login_form">                      
            Usuario: <input type="text" name="Usuario" />
            Password: <input type="password" 
                             name="password" 
                             id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Actualmente Logueado ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>¿Cambiar de Usuario? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Actualmente Logueado ' . $logged . '.</p>';
                        echo "<p>Si no cuentas con Login, Favor de <a href='register.php'> Registrase </a></p>";
                }
?>      
    </body>
</html>