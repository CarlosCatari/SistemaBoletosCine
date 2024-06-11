$(document).ready(function() {
    $("#opcion1").change(function() {
        if (this.checked) {
            $("#contenedor-tarjeta").removeClass("d-none");
            $("#contenedor-billetera").addClass("d-none");
        }
    });

    $("#opcion2").change(function() {
        if (this.checked) {
            $("#contenedor-billetera").removeClass("d-none");
            $("#contenedor-tarjeta").addClass("d-none");
        }
    });
});
