function cancelarNuevoInvestigador(){
    document.location.href="index.php";
}
function validarNuevoInvestigador(){
    const forms = document.querySelectorAll('.needs-validation');
  
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        var valido = false;
        var titulo = document.getElementById("titulo");
        if(titulo.value == ""){
            titulo.classList.add("is-invalid");
            valido = false;
        }else{
            titulo.classList.remove("is-invalid");
            titulo.classList.add("is-valid");
            valido = true;
        }
        var nombres = document.getElementById("nombres");
        if(nombres.value == ""){
            nombres.classList.add("is-invalid");
            valido = false;
        }else{
            nombres.classList.remove("is-invalid");
            nombres.classList.add("is-valid");
            valido = true;
        }
        var apellido_1 = document.getElementById("apellido_1");
        if(apellido_1.value == ""){
            apellido_1.classList.add("is-invalid");
            valido = false;
        }else{
            apellido_1.classList.remove("is-invalid");
            apellido_1.classList.add("is-valid");
            valido = true;
        }
        var apellido_2 = document.getElementById("apellido_2");
        if(apellido_2.value == ""){
            apellido_2.classList.add("is-invalid");
            valido = false;
        }else{
            apellido_2.classList.remove("is-invalid");
            apellido_2.classList.add("is-valid");
            valido = true;
        }
        var correo = document.getElementById("correo");
        if(correo.value == ""){
            correo.classList.add("is-invalid");
            valido = false;
        }else{
            correo.classList.remove("is-invalid");
            correo.classList.add("is-valid");
            valido = true;
        }
        var telefono = document.getElementById("telefono");
        if(telefono.value == ""){
            telefono.classList.add("is-invalid");
            valido = false;
        }else{
            telefono.classList.remove("is-invalid");
            telefono.classList.add("is-valid");
            valido = true;
        }
        

        form.classList.add('was-validated');
        if(valido){
            form.method="post";
            form.action="guardar.php";
            return true;
        }else{
            return false;
        }
        
      }, false)
    });
}

function cancelarEditarInvestigador(){
    var editarbtn = document.getElementById("editarbtn");
    var actualizarbtn = document.getElementById("actualizarbtn");
    editarbtn.classList.add("visible");
    editarbtn.classList.remove("invisible");
    actualizarbtn.classList.remove("visible");
    actualizarbtn.classList.add("invisible");

    var titulo = document.getElementById("titulo");
    titulo.setAttribute("readonly","readonly");  
    var nombres = document.getElementById("nombres");
    nombres.setAttribute("readonly","readonly");
    var apellido_1 = document.getElementById("apellido_1");
    apellido_1.setAttribute("readonly","readonly");
    var apellido_2 = document.getElementById("apellido_2");
    apellido_2.setAttribute("readonly","readonly");
    var correo = document.getElementById("correo");
    correo.setAttribute("readonly","readonly");
    var telefono = document.getElementById("telefono");
    telefono.setAttribute("readonly","readonly");
    var estatus = document.getElementById("estatus");
    estatus.setAttribute("disabled","disabled");  

}
function editarInvestigador(){
    var editarbtn = document.getElementById("editarbtn");
    var actualizarbtn = document.getElementById("actualizarbtn");
    editarbtn.classList.remove("visible");
    editarbtn.classList.add("invisible");
    actualizarbtn.classList.add("visible");
    actualizarbtn.classList.remove("invisible");

    var titulo = document.getElementById("titulo");
    titulo.removeAttribute("readonly");
    var nombres = document.getElementById("nombres");
    nombres.removeAttribute("readonly");
    var apellido_1 = document.getElementById("apellido_1");
    apellido_1.removeAttribute("readonly");
    var apellido_2 = document.getElementById("apellido_2");
    apellido_2.removeAttribute("readonly");
    var correo = document.getElementById("correo");
    correo.removeAttribute("readonly");
    var telefono = document.getElementById("telefono");
    telefono.removeAttribute("readonly");
    var estatus = document.getElementById("estatus");
    estatus.removeAttribute("disabled");
    nombres.focus();
}

function actualizarInvestigador(){
    const forms = document.querySelectorAll('.needs-validation');
  
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        var valido = false;
        var titulo = document.getElementById("titulo");
        if(titulo.value == ""){
            titulo.classList.add("is-invalid");
            valido = false;
        }else{
            titulo.classList.remove("is-invalid");
            titulo.classList.add("is-valid");
            valido = true;
        }
        var nombres = document.getElementById("nombres");
        if(nombres.value == ""){
            nombres.classList.add("is-invalid");
            valido = false;
        }else{
            nombres.classList.remove("is-invalid");
            nombres.classList.add("is-valid");
            valido = true;
        }
        var apellido_1 = document.getElementById("apellido_1");
        if(apellido_1.value == ""){
            apellido_1.classList.add("is-invalid");
            valido = false;
        }else{
            apellido_1.classList.remove("is-invalid");
            apellido_1.classList.add("is-valid");
            valido = true;
        }
        var apellido_2 = document.getElementById("apellido_2");
        if(apellido_2.value == ""){
            apellido_2.classList.add("is-invalid");
            valido = false;
        }else{
            apellido_2.classList.remove("is-invalid");
            apellido_2.classList.add("is-valid");
            valido = true;
        }
        var correo = document.getElementById("correo");
        if(correo.value == ""){
            correo.classList.add("is-invalid");
            valido = false;
        }else{
            correo.classList.remove("is-invalid");
            correo.classList.add("is-valid");
            valido = true;
        }
        var telefono = document.getElementById("telefono");
        if(telefono.value == ""){
            telefono.classList.add("is-invalid");
            valido = false;
        }else{
            telefono.classList.remove("is-invalid");
            telefono.classList.add("is-valid");
            valido = true;
        }

        form.classList.add('was-validated');
        if(valido){
            form.method="post";
            form.action="actualizar.php";
            return true;
        }else{
            return false;
        }
        
      }, false)
    });
}