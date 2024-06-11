<?php include('../est/header.php'); ?>
<body>
  <div class="container mt-4">
    <div>Elige una forma de pago</div>
    <div>
      <input type="text" placeholder="Nombre completo">
      <input type="text" placeholder="Correo electrónico">
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="opciones" id="opcion1" value="opcion1">
      <label class="form-check-label" for="opcion1">Tarjeta de Crédito o Débito</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="opciones" id="opcion2" value="opcion2">
      <label class="form-check-label" for="opcion2">Billetera Electrónica</label>
    </div>

    <div id="contenedor1" class="mt-3 d-none">
    <form action="">
      <img src="../icons/visa.jpg" alt="visa" style="width: 50px;">
      <img src="../icons/american.png" alt="visa" style="width: 50px;">
      <img src="../icons/mastercard.png" alt="visa" style="width: 50px;"><br>
    <input type="text" placeholder="Número de la tarjeta">
    <select name="tipo" id="tipo">
    <option value="Tipo">Tipo de Tarjeta</option>
        <option value="Crédito">Crédito</option>
        <option value="Débito">Débito</option>
    </select><br>

    <select name="Mes" id="Mes">
        <option value="Mes">Mes</option>
        <option value="01">01</option>
        <option value="01">02</option>
    </select>
    <select name="anio" id="anio">
        <option value="Año">Año</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
    </select>
    
    <input type="text" placeholder="CVV"><br>

    <select name="tipodoc" id="tipodoc">
        <option value="Tipo de Documento">Tipo de Documento</option>
        <option value="DNI">DNI</option>
        <option value="Otro">Otro</option>
    </select>
    <input type="text" ><br>
    <span>Total a Pagar: S/. 00.00</span>
    <input type="submit" value="Pagar">
</form>

    </div>
    <div id="contenedor2" class="mt-3 d-none">
      <form action="">
      <select name="tipodoc" id="tipodoc">
        <option value="Tipo de Documento">Tipo de Documento</option>
        <option value="DNI">DNI</option>
        <option value="Otro">Otro</option>
    </select>
    <input type="text" ><br>
    <input type="text" placeholder="Número de celular"><br>
    <img src="../icons/yape.png" alt="yape" style="width: 50px;">
    <img src="../icons/plin.jpg" alt="plin" style="width: 50px;">
    <img src="../icons/tunki.jpg" alt="tunki" style="width: 50px;"><br>

    <img src="../icons/qr.png" alt="qryape" style="width: 50px;">
    <img src="../icons/qr.png" alt="qrplin" style="width: 50px;">
    <img src="../icons/qr.png" alt="qrtunki" style="width: 50px;"><br>
    <span>Total a Pagar: S/. 00.00</span>
    <input type="submit" value="Pagar">
      </form>
    </div>
  </div>
  <script src="../js/botonespago.js"></script>
  
</body>
<?php include('../est/footer.php'); ?>
