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

    let total1 = document.getElementById('preciboletos');
    let total2 = document.getElementById('precioprd');

    const inputipo = document.getElementById('tipotj');
    const inputmes = document.getElementById('mes');
    const inputanio = document.getElementById('anio');

    const inputtj = document.getElementById('numtarjeta');
    const inputcvv = document.getElementById('numcvv');

    function updateDocField() {
        if (opcion1.checked) {
            tipoDocBilletera.disabled = true;
            numDocBilletera.disabled = true;
            numCelular.disabled = true;
            
            inputipo.disabled = false;
            inputmes.disabled = false;
            inputanio.disabled = false;

            inputtj.disabled = false;
            inputcvv.disabled = false;

            numDocTarjeta.value = dni;
            numDocTarjeta.disabled = false;
            tipoDocTarjeta.value = 'DNI';
            tipoDocTarjeta.disabled = false;
            ventanaEsperandoPago.style.display = 'none';

            let total1Value = parseFloat(total1.textContent) || 0;
            let total2Value = parseFloat(total2.textContent) || 0;
            let totalSum = total1Value + total2Value;
            document.getElementById('preciototal').textContent = totalSum.toFixed(2);
            document.getElementById('preciototal2').textContent = totalSum.toFixed(2);

            numDocBilletera.value = '';
            numCelular.value = '';
            tipoDocBilletera.value = 'Tipo de Documento';
            ventanaEsperandoPago.style.display = 'none';
            document.getElementById('preciototalyp').textContent = "00.00";
        }
        if (opcion2.checked) {
            tipoDocBilletera.disabled = false;
            numDocBilletera.disabled = false;
            numCelular.disabled = false;

            numDocBilletera.value = dni;
            numCelular.value = phone;
            tipoDocBilletera.value = 'DNI';
            ventanaEsperandoPago.style.display = 'block';

            let total1Value = parseFloat(total1.textContent) || 0;
            let total2Value = parseFloat(total2.textContent) || 0;
            let totalSum = total1Value + total2Value;
            document.getElementById('preciototal').textContent = totalSum.toFixed(2);
            document.getElementById('preciototalyp').textContent = totalSum.toFixed(2);

            inputtj.value = '';
            inputtj.disabled = true;

            inputmes.disabled = true;
            inputanio.disabled = true;

            inputcvv.value = '';
            inputcvv.disabled = true;
            inputipo.disabled = true;

            numDocTarjeta.disabled = true;
            tipoDocTarjeta.disabled = true;
            inputipo.disabled = true;

            numDocTarjeta.value = '';
            tipoDocTarjeta.value = 'Tipo de Documento';
            document.getElementById('preciototal2').textContent = "00.00";
        }
    }

    opcion1.addEventListener('change', updateDocField);
    opcion2.addEventListener('change', updateDocField);


    
});