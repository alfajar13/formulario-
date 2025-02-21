// Usuario.php
<?php
class Usuario {
    private $nombre;
    private $apellidos;
    private $edad;
    private $email;
    private $password;

    public function __construct($nombre, $apellidos, $edad, $email, $password) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT); // Hash de la contraseña
    }

    public function guardarEnArchivo() {
        $archivo = 'usuarios.json';
        $datosUsuario = [
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'edad' => $this->edad,
            'email' => $this->email,
            'password' => $this->password
        ];

        $usuarios = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];
        $usuarios[] = $datosUsuario;

        return file_put_contents($archivo, json_encode($usuarios, JSON_PRETTY_PRINT));
    }
}
?>
