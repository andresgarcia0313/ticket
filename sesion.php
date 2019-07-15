<?php
include_once 'Usuario.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sesion
 *
 * @author andres
 */
$ObjUsuario = new Usuario($_POST['correo'], $_POST['clave']);


