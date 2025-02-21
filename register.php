// register.php
<?php
require_once 'Usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $edad = intval($_POST['edad']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    if ($password !== $repassword) {
        echo "Error: Las contraseñas no coinciden.";
        exit();
    }

    $usuario = new Usuario($nombre, $apellidos, $edad, $email, $password);
    if ($usuario->guardarEnArchivo()) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error al guardar el usuario.";
    }
}
?>
