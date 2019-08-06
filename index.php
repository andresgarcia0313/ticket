<?php include_once 'CapasMVC/Vista/Cabecera_Web.php'; ?>
<div style="text-align: center;">
    <h1>Ticket Platform</h1>
    <form action="CapasMVC/Controlador/UsuarioSesion.php" method="post">
        <p><input name="correo" placeholder="Ingrese Nombre" type="text"></p>
        <p><input name="clave" placeholder="Ingrese Clave" type="password"></p>
        <input value="Acceder" type="submit">
    </form>
</div>
<?php include_once 'CapasMVC/Vista/Pie_De_Pagina.php'; ?>
