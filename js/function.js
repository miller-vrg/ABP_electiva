
document.getElementById("email").addEventListener("input", function() {
    campo = event.target;
    validacion = document.getElementById("email");
    buttonEditar = document.querySelector(".btn-editar");
    buttonRegistro = document.querySelector(".btn-registrarse");

    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
        validacion.style = "color: #0099ff;";
        buttonEditar.disabled=false;
        buttonRegistro.disabled=false;
    } else {
        validacion.style = "color:red;";
        buttonEditar.disabled=true;
        buttonRegistro.disabled=true;
    }
});