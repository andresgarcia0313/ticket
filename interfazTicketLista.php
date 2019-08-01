<?php
include_once './interfazCabeceraweb.php';
?>
<div>
    <?php
    include_once './classTicket.php';
    echo "<table>\n";
    $sqltitulofilas = "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'ticket';";
    $objdbtitulos = new BaseDeDatos($sqltitulofilas);
    $rotulos = $objdbtitulos->getarrayresultadonum();
    echo "\t<tr>\n";
    foreach ($rotulos as $titulo) {
        foreach ($titulo as $valorcampo) {
            echo "\t\t<th>" . strtoupper($valorcampo) . "</th>\n";
        }
    }
    echo "\t</tr>\n";
    $sql = "SELECT * FROM ticket;";
    $objdb = new BaseDeDatos($sql);
    $registros = $objdb->getarrayresultadonum();
    foreach ($registros as $fila) {
        echo "\t<tr>\n";
        foreach ($fila as $valorcampo) {
            echo "\t\t<td>$valorcampo</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
    ?>
</div>
<?php
include_once './interfazPiedepaginaweb.php';
