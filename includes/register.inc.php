<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 

 //post[email es RFC, basicamente por cuestiones de seguimiento de guia no se cambio]
if (isset($_POST['username'],$_POST['p'], $_POST['email'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    
    //Revisar si existe el RFC
    $RFC=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    //mas opciones de verificacion rfc, para despues
    //
    //
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 

    // check existing username
    $prep_stmt = "SELECT RFC FROM empleado WHERE Usuario = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
                if ($stmt->num_rows == 1) {
                        // A user with this username already exists
                        $error_msg .= '<p class="error">Ya existe este Usuario</p>';
                        $stmt->close();
                }
        } else {
                $error_msg .= '<p class="error">Error de Base de datos Numero: 55</p>';
                $stmt->close();
        }
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
 
        // Create hashed password using the password_hash function.
        // This function salts it with a random salt and can be verified with
        // the password_verify function.
        $password = password_hash($password, PASSWORD_BCRYPT);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO empleado (RFC, Nombre, Apellido, Usuario, Contraseña) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param($RFC, $username, $username, $username, $password);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.php');
    }
}
?>