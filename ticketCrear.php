<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Crear Ticket</title>
    </head>
    <body>
        <div>
        <h1>Crear Ticket</h1>
        <form name="Crear Ticket" action="crearticket.php" method="POST" autocomplete="off"
              enctype="text/plain" target="Crear Ticket">
            <select name="central" required="required">
                <option value="TEQUENDAMA" selected="selected">TEQUENDAMA</option>
            </select><br><br>
            <input name="nombresSolicitante" required="required" maxlength="100" autocomplete="off" type="text" placeholder="Nombres Solicitante"><br><br>
            <input name="apellidosSolicitante" required="required" maxlength="100" autocomplete="off" type="text" placeholder="Apellidos Solicitante"><br><br>
            <input name="telefonoFijo" required="required" size="7" maxlength="9" autocomplete="off" type="tel" placeholder="Teléfono Fijo">  
            <input name="telefonoFijoExt" required="required" size="3" maxlength="3" autocomplete="off" type="tel" placeholder="Extensión"><br><br>
            <input name="telefonoMovil" required="required" size="10" maxlength="10" autocomplete="off" type="tel" placeholder="Celular"><br><br>
            <input name="correo" required="required" maxlength="100" autocomplete="off" type="email" placeholder="correo"><br><br>
            <input name="medidor" required="required" size="10" maxlength="10" autocomplete="off" type="text" placeholder="medidor"><br><br>
            <select name="tipoTicket" required="required">
                <option value="" disabled="disabled" selected="selected">Eligir Tipo De Ticket</option>
                <option value="Emergencia">Emergencia</option>
                <option value="Falla Intermitente">Falla Intermitente</option>
                <option value="Falla Permanente">Falla Permanente</option>
                <option value="Información De Acceso">Información De Acceso</option>
                <option value="Solicitud De Configuración">Solicitud De Configuración</option>
                <option value="Otro">Otro</option>
            </select><br><br>
            <textarea name="solicitud" cols="30" rows="4" required="required" maxlength="255" wrap="soft" placeholder="Ingrese titulo de la solicitud"></textarea><br><br>
            <textarea name="incidencia" cols="30" rows="10" required="required" maxlength="4000" wrap="soft"></textarea><br><br>
            <input name="archivo" type="file"><br><br>
            <input name="enviar" formmethod="post" type="submit"><br><br>
        </form>
        </div>
    </body>
</html>
