document.addEventListener('DOMContentLoaded', function() {
    const opcion1 = document.getElementById('opcion1');
    const opcion2 = document.getElementById('opcion2');
    const numDocTarjeta = document.getElementById('numero-doc-tarjeta');
    const numDocBilletera = document.getElementById('numero-doc-billetera');
    const numCelular = document.getElementById('numero-celular');
    const tipoDocTarjeta = document.getElementById('tipodoc');
    const tipoDocBilletera = document.getElementById('tipodoc2');
    const ventanaEsperandoPago = document.getElementById('ventana-esperando-pago');
    const dni = window.dniUser;
    const phone = window.phoneUser;

    function updateDocField() {
        if (opcion1.checked) {
            numDocTarjeta.value = dni;
            tipoDocTarjeta.value = 'DNI';
            ventanaEsperandoPago.style.display = 'none';
        } else {
            numDocTarjeta.value = '';
            tipoDocTarjeta.value = 'Tipo de Documento';
        }

        if (opcion2.checked) {
            numDocBilletera.value = dni;
            numCelular.value = phone;
            tipoDocBilletera.value = 'DNI';
            ventanaEsperandoPago.style.display = 'block';
        } else {
            numDocBilletera.value = '';
            numCelular.value = '';
            tipoDocBilletera.value = 'Tipo de Documento';
            ventanaEsperandoPago.style.display = 'none';
        }
    }

    opcion1.addEventListener('change', updateDocField);
    opcion2.addEventListener('change', updateDocField);
});