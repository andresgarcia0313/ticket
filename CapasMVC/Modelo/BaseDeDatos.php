<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <author@example.com>
 * @author     Another Author <another@example.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */
/**
 * This is a "Docblock Comment," also known as a "docblock."  The class'
 * docblock, below, contains a complete description of how to write these.
 */
//require_once 'PEAR.php';
// {{{ constants

/**
 * Methods return this if they succeed
 */
//define('NET_SAMPLE_OK', 1);
// }}}
// {{{ GLOBALS

/**
 * The number of objects created
 * @global int $GLOBALS['_NET_SAMPLE_Count']
 */
//$GLOBALS['_NET_SAMPLE_Count'] = 0;
// }}}

/**
 * Descripción de BaseDeDatos
 * Esta clase facilita funciones de datos comunes para ser heredada a los 
 * distintas clases que representan entidades en la base de datos.
 * 
 * sistema
 * @author andresgarcia0313@gmail.com
 */
class BaseDeDatos
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
    private $resultadoArrayAmbos;

    /** @var array <p>Datos de la transformación de mysqli_result a array tipo 
     * numerico</p> */
    private $resultadoArrayNumerico;

    /** @var array <p>Cantidad de registros al realizar un select</p> */
    private $conteoDeRegistros;

    /** @var string <p>Consulta en formato sql */
    private $sql;

    /** @var mysqli $conexion Conexión con el Gestor de Base De Datos */
    private $conexion;

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
        $this->sql = $sql;
        if ($sql != NULL) {
            $this->consultar($sql);
        }
        $this->conectar();
    }

    function conectar()
    {
        $this->conexion = new mysqli($this->hospedador, $this->usuario, $this->clave, $this->baseDeDatos, $this->puerto, $this->enchufe);
        if ($this->conexion->connect_errno != 0) {
            echo "Sin conectar al Gestor De Base De Datos: " . $this->conexion->connect_error;
        }
        $this->conexion->set_charset("utf8");
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
        switch (strtoupper(substr($sql, 0, 6))) {
            case "SELECT":
                return $this->resultadoArrayAmbos = $this->conexion->query($sql)->fetch_all(MYSQLI_BOTH);
                break;
            default:
                echo "No es SELECT";
        }
        $this->conexion->close();
    }

    /**
     * Permite retornar los titulos de los campos de una tabla para bases de 
     * datos mysql 
     * 
     * @param string $tabla nombre de la tabla a consultar sus titulos de campos
     * @return array $titulosCampos
     */
    function titulosCampos($tabla)
    {
        $this->consultar("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = '" . $tabla . "';");
        return $this->getArrayResultadoNumerico();
    }

    /**
     * Obtener el resultado de consulta SQL en formato array numerico.
     * @return array <p>Retorna Array PHP Numerico del select realizado</p>
     */
    function validarConexion()
    {
        try {
            echo '<p>Validando conexión</p>';
            $resultado = $this->consultar("SELECT 'Conectado a DB' AS mensaje FROM DUAL");
            $this->getArrayResultadoNumerico();
            var_dump($this);
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
        return $this->resultadoArrayAmbos;
    }

    function getArrayResultadoNumerico()
    {
        if (count($this->resultadoArrayAmbos) > 0) {
            for ($y = 0; $y < count($this->resultadoArrayAmbos); $y++)
                for ($x = 0; $x < count($this->resultadoArrayAmbos[$y]) / 2; $x++)
                    $this->resultadoArrayNumerico[$y][$x] = $this->resultadoArrayAmbos[$y][$x];
            $this->conteoDeRegistros = count($this->resultadoArrayNumerico);
        }
        return $this->resultadoArrayNumerico;
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
        $this->resultadoArrayAmbos = $arrayResultadoAmbos;
    }

    function setArrayResultadoNumerico($arrayResultadoNumerico)
    {
        $this->resultadoArrayNumerico = $arrayResultadoNumerico;
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