$(document).ready(function () {

    let message = $("#message").val();
    if (message != "") {
        if (message === "denegated") {//Login
            swal("Acceso denegado!", "Usuario o contraseña no válido", "error");
        }
    }

});
