<footer>
    <div>
        <?php
        if (isset($_SESSION['usuario'])) {
            echo "Bienvenido Usuario: " . $_SESSION['usuario'];
        }
        ?>
        <h4>Platform Ticket</h4>
        <h6>Todos los derechos reservados ©</h6>
    </div>
</footer>
</body>
</html>