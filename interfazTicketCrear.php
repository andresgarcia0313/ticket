<?php
include_once './interfazCabeceraweb.php';
?>
<div>
    <h1>Crear Ticket</h1>
    <form name="Crear Ticket" action="LogicaTicket.php" method="POST" target="Crear Ticket">
        <p><select name="central" required="required">
            <option value="TEQUENDAMA" selected="selected">TEQUENDAMA</option>
        </select></p>
        <p><input name="nombresSolicitante" required="required" maxlength="100" type="text" placeholder="Nombres Solicitante"></p>
        <p><input name="apellidosSolicitante" required="required" maxlength="100" type="text" placeholder="Apellidos Solicitante"></p>
        <p><input name="telefonoFijo" required="required" size="7" maxlength="9" type="tel" placeholder="Teléfono Fijo">  
        <p><input name="telefonoFijoExt" required="required" size="3" maxlength="3" type="tel" placeholder="Extensión Teléfono Fijo"></p>
        <p><input name="telefonoMovil" required="required" size="10" maxlength="10" type="tel" placeholder="Celular"></p>
        <p><input name="correo" required="required" maxlength="100" type="email" placeholder="Correo"></p>
        <p><input name="medidor" required="required" size="10" maxlength="10" type="text" placeholder="Medidor"></p>
        <p><select name="tipoTicket" required="required">
            <option value="" disabled="disabled" selected="selected">Elegir Tipo De Ticket</option>
            <option value="Emergencia">Emergencia</option>
            <option value="Falla Intermitente">Falla Intermitente</option>
            <option value="Falla Permanente">Falla Permanente</option>
            <option value="Información De Acceso">Información De Acceso</option>
            <option value="Solicitud De Configuración">Solicitud De Configuración</option>
            <option value="Otro">Otro</option>
        </select></p>
        <p><textarea name="solicitud" cols="30" rows="4" required="required" maxlength="255" wrap="soft" placeholder="Ingrese titulo de la solicitud"></textarea></p>
        <p><textarea name="incidencia" cols="30" rows="10" required="required" maxlength="4000" wrap="soft" placeholder="Ingrese Descripción de la incidencia"></textarea></p>
        Por favor lo archivos se deben comprimir y dejar en un solo archivo
        Si no sabe como hacerlo dejamos el siguiente <a href="https://support.microsoft.com/es-co/help/4028088/windows-zip-and-unzip-files">Click Aquí</a>
        <p>La subida de archivos está desactivada hasta que se validen las pruebas<br><input name="archivo" type="file" disabled></p>
        <p><input formmethod="post" type="submit"></p>
    </form>
</div>
<?php
include_once './interfazPiedepaginaweb.php';
