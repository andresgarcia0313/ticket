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
    private $hospedador = "localhost";

    /** @var string <p>Nombre De Base De Datos</p> */
    private $baseDeDatos = "ticket";

    /** @var string <p>Nombre De Usuario De La Base De Datos</p> */
    private $usuario = "root";

    /** @var string <p>Clave Del Usuario De La Base De Datos</p> */
    private $clave = "7104";

    /** @var string <p>Puerto De Conexión De La Base De Datos</p> */
    private $puerto;

    /** @var string Enchufe o Socket De Conexión que indica puerto o Archivo */
    private $enchufe;

    /** @var mysqli_result <p>Almacena el Resultado de consulta de datos</p> */
    private $objMysqliResult;

    /** @var array <p>Datos de la transformación de mysqli_result asociativo y 
     * numerico</p> */
    private $arrayResultadoAmbos;

    /** @var array <p>Datos de la transformación de mysqli_result a array tipo 
     * numerico</p> */
    private $arrayResultadoNumerico;

    /** @var array <p>Cantidad de registros al realizar un select</p> */
    private $conteoDeRegistros;

    /** @var string <p>Consulta en formato sql */
    private $sql;

    /**
     * Abre nueva conexión al servidor MariaDB y utilizar Consultar si se le 
     * enviá datos si no deja la conexión abierta par a utilizar consultar.
     * y al consultar cierra la conexión
     * 
     * @param string $sql <p>SQL A Consultar</p>
     * @return void <p>Returns an object which represents the connection to a 
     * MySQL Server.</p>
     */
    function __construct($sql = NULL)
    {
        parent::__construct($this->hospedador, $this->usuario, $this->clave, $this->baseDeDatos, $this->puerto, $this->enchufe);
        parent::set_charset("utf8");
        $this->sql = $sql;
        if ($this->sql == NULL) {
        }else{            
            $this->consultar($this->sql);
        }
    }

    /**
     * Consultar SQL.
     * <p>Consultar SQL</p>
     * @param string $sql <p>SQL A Consultar en caso de ser cambiado</p>
     * @return array <p>Retorna Array PHP Both para los insert</p>
     * @return array <p>Retorna Boleanto para otras consulas</p>
     */
    function consultar($sql)
    {
        $this->sql = $sql;
        $this->objMysqliResult = $this->query($this->sql);
        $tipoConsulta = substr($this->sql, 0, 6);
        switch ($tipoConsulta) {
            case "INSERT":
                echo "INSERT";
                $this->close();
                return void;
                break;
            case "SELECT":
                $this->arrayResultadoAmbos = $this->objMysqliResult->fetch_all(MYSQLI_BOTH);
                $countY = count($this->arrayResultadoAmbos);
                if($countY>0){
                for ($y = 0; $y < $countY; $y++) {
                    $countX = count($this->arrayResultadoAmbos[$y]) / 2;
                    $fila = $this->arrayResultadoAmbos[$y];
                    for ($x = 0; $x < $countX; $x++) {
                        $array[$y][$x] = $fila[$x];
                    }
                }
                $this->arrayResultadoNumerico = $array;
                $this->conteoDeRegistros = count($array);
                }
                $this->close();
                return $this->arrayResultadoAmbos;
                break;
            case "UPDATE":
                echo "UPDATE";
                $this->close();
                break;
            case "DELETE":
                echo "DELETE";
                $this->close();
                break;
        }
        $this->close();
    }

    /**
     * Obtener el resultado de consulta SQL en formato array numerico.
     * @return array <p>Retorna Array PHP Numerico del select realizado</p>
     */
    function validarConexión()
    {
        try {
            $return = parent::__construct($this->hospedador, $this->usuario, $this->clave, $this->baseDeDatos, $this->puerto, $this->enchufe);
            if ($return == 0) {
                throw new Exception("Se Deja De Tener Conexión A Base De Datos");
            }
            if ($this->sql == null) {
                $this->consultar("SELECT 'Conectado a DB' AS mensaje FROM DUAL");
            }
        } catch (Exception $e) {
            echo 'Excepción: ', $e->getMessage(), "\n";
        }
    }

    function getHospedador()
    {
        return $this->hospedador;
    }

    function getBaseDeDatos()
    {
        return $this->baseDeDatos;
    }

    function getUsuario()
    {
        return $this->usuario;
    }

    function getClave()
    {
        return $this->clave;
    }

    function getPuerto()
    {
        return $this->puerto;
    }

    function getEnchufe()
    {
        return $this->enchufe;
    }

    function getObjMysqliResult(): mysqli_result
    {
        return $this->objMysqliResult;
    }

    function getArrayResultadoAmbos()
    {
        return $this->arrayResultadoAmbos;
    }

    function getArrayResultadoNumerico()
    {
        return $this->arrayResultadoNumerico;
    }

    function getSql()
    {
        return $this->sql;
    }

    function setHospedador($hospedador)
    {
        $this->hospedador = $hospedador;
    }

    function setBaseDeDatos($baseDeDatos)
    {
        $this->baseDeDatos = $baseDeDatos;
    }

    function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    function setClave($clave)
    {
        $this->clave = $clave;
    }

    function setPuerto($puerto)
    {
        $this->puerto = $puerto;
    }

    function setEnchufe($enchufe)
    {
        $this->enchufe = $enchufe;
    }

    function setObjMysqliResult(mysqli_result $objMysqliResult)
    {
        $this->objMysqliResult = $objMysqliResult;
    }

    function setArrayResultadoAmbos($arrayResultadoAmbos)
    {
        $this->arrayResultadoAmbos = $arrayResultadoAmbos;
    }

    function setArrayResultadoNumerico($arrayResultadoNumerico)
    {
        $this->arrayResultadoNumerico = $arrayResultadoNumerico;
    }

    function setSql($sql)
    {
        $this->sql = $sql;
    }

    function getConteoDeRegistros()
    {
        return $this->conteoDeRegistros;
    }

    function setConteoDeRegistros($conteoDeRegistros)
    {
        $this->conteoDeRegistros = $conteoDeRegistros;
    }

}

//Codigo para comprobar si existe
/*
$objBaseDeDatos = new BaseDeDatos();
$sql = "SELECT correo, clave FROM Usuario WHERE correo='andresgarcia0313@gmail.com' AND clave='7104'";
$objBaseDeDatos->consultar($sql);
($objBaseDeDatos->getConteoDeRegistros());
*/