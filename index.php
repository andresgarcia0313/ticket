<?php
include_once './cabeceraweb.php';
?>
<div style="text-align: center;">
    <h1>Ticket Platform</h1>
    <form action="usuariosesion.php" method="post">
        <input name="correo" placeholder="Ingrese Nombre" type="text"><br>
        <input name="clave" placeholder="Ingrese Clave" type="password"><br>
        <input value="Acceder" type="submit">
    </form>

</div>
<?php
include_once './piedepaginaweb.php';
?>
