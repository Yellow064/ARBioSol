<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In Seguro: Formato de Registro</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1>Registrate</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <ul>
            <li>Nombres de Usuario Solamente pueden Contener Letras, Digitos y Guiones Bajos</li>
            <li>RFC</li>
            <li>Contraseña de Al menos 6 Caracteres</li>
            <li>Contraseñas deben Contener
                <ul>
                    <li>Una letras Capital minimo</li>
                    <li>Minimo una letra Minuscula</li>
                    <li>Al menos un numero</li>
                </ul>
            </li>
            <li>Contraseña y contraseña de confirmacion deben coincidir</li>
        </ul>
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" 
                method="post" 
                name="registration_form">
            Username: <input type='text' 
                name='username' 
                id='username' /><br>
            RFC: <input type="text" name="RFC" id="rfc" /><br>
            Password: <input type="password"
                             name="password" 
                             id="password"/><br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
            <input type="button" 
                   value="Registrar" 
                   onclick="return regformhash(this.form,
                                   this.form.rfc,
                                   this.form.username,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
        <p>Regresar a <a href="index.php">Pagina de Log In</a>.</p>
    </body>
</html>