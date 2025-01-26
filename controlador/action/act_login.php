<?php
        ob_start();
        session_start();
        require_once (__DIR__."/../mdb/mdbUsuario.php");

	if(isset($_POST['submit'])){
		$errMsg = '';
		//username and password sent from Form
		$correo = $_POST['correo'];
		$contrasena = $_POST['password'];
                
                $usuario = autenticarUsuario($correo, $contrasena);
                echo $correo;

		if($usuario != null){ // Puede iniciar sesión
                    $_SESSION['ID_USUARIO'] = $usuario->getIdUsuario();
                    $_SESSION['ROL_USUARIO'] = $usuario->getRol();
                    $_SESSION['CORREO_USUARIO'] = $usuario->getCorreo();
                    $_SESSION['NOMBRE_USUARIO'] = $usuario->getNombre();
                    $_SESSION['APELLIDO_USUARIO'] = $usuario->getApellido();
                    $_SESSION['PASSWORD_USUARIO'] = $usuario->getPassword();
                    $_SESSION['PROGRAMA_USUARIO'] = $usuario->getIdPrograma();
                    $_SESSION['TIPO_ACTIVIDADES'] = NULL;
                    $_SESSION['FOTO_USUARIO'] = $usuario->getFoto();


                    header("Location: ../../principal.php");
		}else{ // No puede iniciar sesión
                    $errMsg .= 'Email and Password are not found';
                    header("Location: ../../login.html");
		}
	}
        
        
        // No puede iniciar sesión
       // header("Location: ../../vista/login.html");
        
?>
