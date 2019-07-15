<?php

include_once 'BaseDeDatos.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 * Permite Hacer Operaciones Como Crear La Sesión Del Usuario
 * @author andres
 */
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
            $_SESSION['Usuario'] = $_POST['correo'];
            header("location: ticket.html");
        } else {
            session_destroy();
            header("location: index.html");
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
