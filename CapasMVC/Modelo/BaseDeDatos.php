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
class BaseDeDatos extends mysqli
{

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

    /** @var mysqli_result <p>Almacena el Resultado de consulta de datos</p> */
    private $ObjMysqliResult;

    /** @var array <p>Datos de la transformación de mysqli_result asociativo y numerico</p> */
    private $arrayResultado;

    /** @var array <p>Datos de la transformación de mysqli_result numerico</p> */
    private $arrayResultadoNum;

    /** @var string <p>Consulta en formato sql */
    private $_sql;

    /**
     * Abre nueva conexión al servidor MariaDB y Consulta si se le enviá datos si no deja el string listo para consultar.
     * 
     * @param string $sql <p>SQL A Consultar</p>
     * @return void <p>Returns an object which represents the connection to a MySQL Server.</p>
     */
    function __construct($sql = NULL)
    {
        $this->_sql = $sql;
        $return = parent::__construct($this->host, $this->username, $this->passwd, $this->dbname, $this->port, $this->socket);
        parent::set_charset("utf8");
        if ($this->_sql != NULL) {
            $this->consultar($this->_sql);
        }
    }

    /**
     * Consultar SQL.
     * <p>Consultar SQL</p>
     * @param string $sql <p>SQL A Consultar</p>
     * @return array <p>Retorna Aray PHP</p>
     */
    function consultar($sql)
    {
        $this->_sql = $sql;
        /* Instancia de mysqli_result con resultados obtenidos */
        $this->ObjMysqliResult = $this->query($this->_sql);
        /* Extrae todo en un array php */
        
        if ("INSERT" == substr($this->_sql, 0, 6)) {
            /**
             * Valida la consulta si es insert para tratarse como tal 
             * se identifica que se debe hacer un manejo si es true o false 
             * posteriormente se debe actualizar está condicional ;)
             */
            $this->close();
            return void;
        } else {
            $this->ObjMysqliResult = $this->query($this->_sql);

            if ($this->ObjMysqliResult != TRUE ) {
                
                /**
                 * Condicional para controlar el retorno de la consulta sql
                 * al ser TRUE pueda hacer este retorno y cuando es un array lo 
                 * que envia el motor de datos los retorne
                 */
                if($this->ObjMysqliResult != FALSE){
                    $this->arrayResultado = $this->ObjMysqliResult->fetch_all(MYSQLI_BOTH);
                    $this->ObjMysqliResult = $this->query($this->_sql);
                    $this->arrayResultadoNum = $this->ObjMysqliResult->fetch_all(MYSQLI_NUM);
                    $this->close();
                    return $this->arrayResultado;
                }
            } else {
                /**
                 * Hay consultas sql que tienen retorno de mysqli un valor 
                 * booleano por ende aquí se retorna dicho valor después de 
                 * realizar la consulta
                 */
                return $this->ObjMysqliResult;
            }
        }
    }

    /**
     * Obtener el resultado de consulta SQL en formato array numerico.
     * @return array <p>Retorna Array PHP Numerico del select realizado</p>
     */
    function getarrayresultadonum()
    {
        return $this->arrayResultadoNum;
    }

    function validarConexión()
    {
        try {
            $return = parent::__construct($this->host, $this->username, $this->passwd, $this->dbname, $this->port, $this->socket);
            if ($return == 0) {
                throw new Exception("Se Deja De Tener Conexión A Base De Datos");
            }
            if ($this->_sql == null) {
                $this->consultar("SELECT 'Conectado a DB' AS mensaje FROM DUAL");
            }
        } catch (Exception $e) {
            echo 'Excepción: ', $e->getMessage(), "\n";
        }
    }

}
