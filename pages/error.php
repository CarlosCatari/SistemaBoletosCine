<?php
    session_start();
    include('../est/header.php'); 
?>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <img src="../images/cargando.jpg" alt="cargando" style="width: 300px;">
        <p>Lo sentimos, hemos tenido un problema.</p> 
        <p>Serás redirigido a la página de inicio de sesión en <span id="time" class="fw-bold">15</span> segundos.</p>
        <a href="registro.php">¿Todavía no estás registrado?</a>
    </div>
    <script src="../js/timererrorpagina.js"></script>
</body>
<?php include('../est/footer.php'); ?>
