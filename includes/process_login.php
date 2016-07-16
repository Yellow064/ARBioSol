
<?php
include_once 'db_connect.php';
include_once 'functions.php';
#php debugging
#Start buffering the output. Not required if output_buffering is set on in php.ini file
#get a firePHP variable reference
#php debuggin

sec_session_start(); // Our custom secure way of starting a PHP session.


if (isset($_POST['Usuario'], $_POST['p'])) {
    $Usuario = $_POST['Usuario'];
    $Contraseña = $_POST['p']; // The hashed password.
    if (login($Usuario, $Contraseña, $mysqli) == true) {
        header('Location: ../protected_page.php');
        exit();
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');

    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}

