<?php
ob_start();
session_start();
require_once(__DIR__ . "/../mdb/mdbUsuario.php");

if (isset($_POST['submit'])) {
        $errMsg = '';
        //username and password sent from Form
        $correo = $_POST['correo'];
        $password = recuperarContrasena($correo);

        if ($password != null) { // Puede iniciar sesión
                $mailfrom="webCalendar@unimag.com";
                $subject = "Recuperar contraseña Calendario Universitario";
                
                $content = "Hola, tu contraseña es: " . $password; // Reemplaza $contraseña con la variable que contiene la contraseña del usuario
                $headers = "From: ".$mailfrom; // Reemplaza "Tu Nombre" y "tucorreo@tudominio.com" con tu información

                $successMessage = 'Se te ha enviado tu contraseña al correo, la recibirás pronto!';
                $errorMessage = 'Tu mensaje no pudo ser enviado, intenta de nuevo más tarde';
                
                if (mail($correo, $subject, $content, $headers)) {
                    $message = $successMessage;
                } else {
                    $message = $errorMessage;
                }
                
                header("Location: ../../login.html");
        } else { // No se encuentra el 
                $message=  'No se ha encontrado tu direccion de correo electronico, puedes regsitrarte';
                header("Location: ../../forgotpassword.html");
        }
}


// No puede iniciar sesión
// header("Location: ../../vista/login.html");

?>