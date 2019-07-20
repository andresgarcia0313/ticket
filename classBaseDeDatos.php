<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Los terminos de licencia serán definidos por el propietario o futuro comprador de este código
 */

/**
 * Description of BaseDeDatos
 * La misión de está clase es tratar los metodos de conexión para todo el sistema
 * @author andresgarcia0313@gmail.com
 */
class BaseDeDatos extends mysqli {

    /** @var string <p>Dirección del Servidor o Ip</p> */
    private $host = "localhost";

    /** @var string <p>Nombre De Base De Datos</p> */
    private $dbname = "ticket";

    /** @var string <p>Nombre De Usuario De La Base De Datos</p> */
    private $username = "root";

    /** @var string <p>Clave Del Usuario De La Base De Datos</p> */
    private $passwd = "7104";

    /** @var string <p>Puerto De Conexión De La Base De Datos</p> */
    private $port;

    /** @var string <p>Socket De Conexión o Ruta De Archivo Cuanto La Conexión No Es Por Puerto</p> */
    private $socket;

    /** @var string <p>Nombre De Base De Datos</p> */
    private $ObjMysqliResult;

    /** @var array <p>Nombre De Base De Datos</p> */
    private $arrayResultado;

    /**
     * Abre nueva conexión al servidor MariaDB y Consulta.
     * <p>Abre nueva conexión al servidor MariaDB y Consulta</p>
     * @param string $sql <p>SQL A Consultar</p>
     * @return void <p>Returns an object which represents the connection to a MySQL Server.</p>
     */
    function __construct($sql) {
        $return = parent::__construct($this->host, $this->username, $this->passwd, $this->dbname, $this->port, $this->socket);
        parent::set_charset("utf8");
        $this->consultar($sql);
    }

    /**
     * Consultar SQL.
     * <p>Consultar SQL</p>
     * @param string $sql <p>SQL A Consultar</p>
     * @return array <p>Retorna Aray PHP</p>
     */
    function consultar($sql) {
        /* Instancia de mysqli_result con resultados obtenidos */
        $this->ObjMysqliResult = $this->query($sql);
        /* Extrae todo en un array php */
        if ("INSERT" == substr($sql, 0, 6)) {
            $this->close();
            return void;
        } else {
            $this->arrayResultado = $this->ObjMysqliResult->fetch_all(MYSQLI_BOTH);
            $this->close();
            return $this->arrayResultado;
        }
    }

    /**
     * resultado de consulta SQL.
     * <p>resultado de consulta SQL</p>
     * @return array <p>Retorna Aray PHP</p>
     */
    function resultado() {
        return $this->arrayResultado;
    }

    function validarConexión() {
        try {
            $return = parent::__construct($this->host, $this->username, $this->passwd, $this->dbname, $this->port, $this->socket);
            if ($return == 0) {
                throw new Exception("Se Deja De Tener Conexión A Base De Datos");
            }
            if ($sql != null) {
                $this->consultar("SELECT 'Conectado a DB' AS mensaje FROM DUAL");
            }
        } catch (Exception $e) {
            echo 'Excepción: ', $e->getMessage(), "\n";
        }
    }

}
