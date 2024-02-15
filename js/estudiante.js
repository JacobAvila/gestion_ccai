function cancelarNuevoEstudiante(){
    document.location.href="index.php";
}
function validarNuevoEstudiante(){
    const forms = document.querySelectorAll('.needs-validation');
  
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        var valido = false;
        var matricula = document.getElementById("matricula");
        if(matricula.value == ""){
            matricula.classList.add("is-invalid");
            valido = false;
        }else{
            matricula.classList.remove("is-invalid");
            matricula.classList.add("is-valid");
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
        var division = document.getElementById("division");
        if(division.value == ""){
            division.classList.add("is-invalid");
            valido = false;
        }else{
            division.classList.remove("is-invalid");
            division.classList.add("is-valid");
            valido = true;
        }
        var password = document.getElementById("password");
        if(password.value == ""){
            password.classList.add("is-invalid");
            valido = false;
        }else{
            password.classList.remove("is-invalid");
            password.classList.add("is-valid");
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

function cancelarEditarEstudiante(){
    var editarbtn = document.getElementById("editarbtn");
    var actualizarbtn = document.getElementById("actualizarbtn");
    editarbtn.classList.add("visible");
    editarbtn.classList.remove("invisible");
    actualizarbtn.classList.remove("visible");
    actualizarbtn.classList.add("invisible");

    var matricula = document.getElementById("matricula");
    matricula.setAttribute("readonly","readonly");  
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
    var division = document.getElementById("division");
    division.setAttribute("disabled","disabled"); 
    var semestre = document.getElementById("semestre");
    semestre.setAttribute("disabled","disabled"); 
    var tipo = document.getElementById("tipo");
    tipo.setAttribute("disabled","disabled");
    var estatus = document.getElementById("estatus");
    estatus.setAttribute("disabled","disabled");

}
function editarEstudiante(){
    var editarbtn = document.getElementById("editarbtn");
    var actualizarbtn = document.getElementById("actualizarbtn");
    editarbtn.classList.remove("visible");
    editarbtn.classList.add("invisible");
    actualizarbtn.classList.add("visible");
    actualizarbtn.classList.remove("invisible");

    var matricula = document.getElementById("matricula");
    matricula.removeAttribute("readonly");
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
    var division = document.getElementById("division");
    division.removeAttribute("disabled");
    var semestre = document.getElementById("semestre");
    semestre.removeAttribute("disabled");
    var tipo = document.getElementById("tipo");
    tipo.removeAttribute("disabled");
    var estatus = document.getElementById("estatus");
    estatus.removeAttribute("disabled");
    nombres.focus();
}

function actualizarEstudiante(){
    const forms = document.querySelectorAll('.needs-validation');
  
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        var valido = false;
        var matricula = document.getElementById("matricula");
        if(matricula.value == ""){
            matricula.classList.add("is-invalid");
            valido = false;
        }else{
            matricula.classList.remove("is-invalid");
            matricula.classList.add("is-valid");
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
        var division = document.getElementById("division");
        if(division.value == ""){
            division.classList.add("is-invalid");
            valido = false;
        }else{
            division.classList.remove("is-invalid");
            division.classList.add("is-valid");
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