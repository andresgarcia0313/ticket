<?php
include_once './interfazCabeceraweb.php';
?>
<div>
    <?php
    include_once './classTicket.php';
    $sql = "SELECT id, central, tipo_ticket, solicitud, descripsion, archivo,"
            . " creacion, cierre, medidor, estado, nombres, apellidos, telefono, "
            . "ext, celular, correo FROM ticket;";
    $objdb = new BaseDeDatos($sql);
    print_r($objdb->consultar($sql));
    ?>
</div>
<?php
include_once './interfazPiedepaginaweb.php';
