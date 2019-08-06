<?php

include_once './classBaseDeDatos.php';

class Usuario {

    /** @var string <p>Correo</p> */
    private $correo;

    /** @var string <p>Clave</p> */
    private $clave;

    public function __construct($correo, $clave) {
        $this->correo = $correo;
        $this->clave = $clave;
        if ($this->iniciarSesion()) {
            session_start();
            $_SESSION['usuario'] = $this->correo;
            header("location: interfazinicio.php");
        } else {
            echo "<center>Contraseña o Cuenta Incorrecta</center>";
            if(isset($_SESSION)){
                session_destroy();
            }
        };
    }

    public function iniciarSesion() {
        $this->clave;
        $this->correo;
        $ObjBD = new BaseDeDatos("SELECT correo, clave FROM Usuario WHERE correo='$this->correo' AND clave='$this->clave';");
        return count($ObjBD->getarrayresultadonum());
    }
}
