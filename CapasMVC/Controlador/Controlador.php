<?php

/*
 * Copyright 2019 agarcia220.
 *
 * Licencia propietaria(the "License");
 * No puede usar este archivo, excepto cumplimiento con la licencia
 * Puede obtener una copia de la licencia en
 *
 *      http://www.andresgarcia.xyz
 *
 * A menos que sea requerido por la ley aplicable o acordado por escrito, software
 * distribuido bajo la licencia se distribuye "TALCUAL",
 * SIN GARANTÍAS O CONDICIONES DE NINGÚN TIPO, expresas o implícitas.
 * Consulte la Licencia para el idioma específico que rige los permisos y 
 * las limitaciones de la Licencia
 * Todos los derechos reservados ©
 * www.andresgarcia.xyz
 */
include_once '../Modelo/BaseDeDatos.php';

/**
 * Description of Controlador
 *
 * @author agarcia220
 */
class Controlador
{

    /**
     * Descripsión de metodo crearTablaHtml
     * Este metodo tiene la misiòn de retornar la informaciòn en html con el 
     * contenido de una tabla
     * 
     * @param string $tabla
     * @return string $html
     */
    function crearTablaHtml($tabla)
    {
        $html = "\n<table>\n";
        $baseDeDatos = new BaseDeDatos();
        $titulostabla = $baseDeDatos->titulosCampos($tabla);
        $html .= "\t<tr>\n";
        foreach ($titulostabla as $titulo) {
            foreach ($titulo as $valorcampo) {
                $html .= "\t\t<th>" . strtoupper($valorcampo) . "</th>\n";
            }
        }$html .= "\t</tr>\n";
        $baseDeDatos->consultar("SELECT * FROM " . $tabla);
        $registros = $baseDeDatos->getArrayResultadoNumerico();
        foreach ($registros as $fila) {
            $html .= "\t<tr>\n";
            foreach ($fila as $valorcampo) {
                $html .= "\t\t<td>$valorcampo</td>\n";
            }
            $html .= "\t</tr>\n";
        }
        $html .= "</table>\n";
        return $html;
    }

}
