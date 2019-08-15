<?php include_once 'Cabecera_Web.php';  ?>
<div>
    <?php
    include_once '../Controlador/TicketControlador.php';
    //Prueba CrearTablaHtml
    echo "HOla";
    echo Ticket::tablaHtml();
    ?>
</div>
<?php
include_once 'Pie_De_Pagina.php';
