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
        if ($this->validarusuario()) {
            session_start();
            $_SESSION['usuario'] = $this->correo;
            
            header("location: interfazinicio.php");
        } else {
            echo "Contraseña o Cuenta Incorrecta";
            session_destroy();
            header("location: index.php");
        };
    }

    public function validarusuario() {
        $this->clave;
        $this->correo;
        /** @var mysqli Conecta a una base de datos y ejecuta una consulta */
        $ObjBD = new BaseDeDatos("SELECT correo, clave FROM Usuario WHERE correo='$this->correo' AND clave='$this->clave';");
        return count($ObjBD->resultado());
    }
}
