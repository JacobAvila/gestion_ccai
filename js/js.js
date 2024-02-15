
function cancelarNuevoProyecto(){
    document.location.href="index.php";
}
function validarNuevoProyecto(){
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
        var objetivo = document.getElementById("objetivo");
        if(objetivo.value == ""){
            objetivo.classList.add("is-invalid");
            valido = false;
        }else{
            objetivo.classList.remove("is-invalid");
            objetivo.classList.add("is-valid");
            valido = true;
        }
        var descripcion = document.getElementById("descripcion");
        if(descripcion.value == ""){
            descripcion.classList.add("is-invalid");
            valido = false;
        }else{
            descripcion.classList.remove("is-invalid");
            descripcion.classList.add("is-valid");
            valido = true;
        }
        var coordinador = document.getElementById("coordinador");
        if(coordinador.value == ""){
            coordinador.classList.add("is-invalid");
            valido = false;
        }else{
            coordinador.classList.remove("is-invalid");
            coordinador.classList.add("is-valid");
            valido = true;
        }
        var fecha_inicio = document.getElementById("fecha_inicio");
        if(fecha_inicio.value == ""){
            fecha_inicio.classList.add("is-invalid");
            valido = false;
        }else{
            fecha_inicio.classList.remove("is-invalid");
            fecha_inicio.classList.add("is-valid");
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
function cancelarEditarProyecto(){
    var editarbtn = document.getElementById("editarbtn");
    var actualizarbtn = document.getElementById("actualizarbtn");
    editarbtn.classList.add("visible");
    editarbtn.classList.remove("invisible");
    actualizarbtn.classList.remove("visible");
    actualizarbtn.classList.add("invisible");

    var titulo = document.getElementById("titulo");
    titulo.setAttribute("readonly","readonly");  
    var objetivo = document.getElementById("objetivo");
    objetivo.setAttribute("readonly","readonly");
    var descripcion = document.getElementById("descripcion");
    descripcion.setAttribute("readonly","readonly");
    var coordinador = document.getElementById("coordinador");
    coordinador.setAttribute("disabled","disabled");
    var fecha_inicio = document.getElementById("fecha_inicio");
    fecha_inicio.setAttribute("readonly","readonly");  
    var estatus = document.getElementById("estatus");
    estatus.setAttribute("disabled","disabled");  

}
function editarProyecto(){
    var editarbtn = document.getElementById("editarbtn");
    var actualizarbtn = document.getElementById("actualizarbtn");
    editarbtn.classList.remove("visible");
    editarbtn.classList.add("invisible");
    actualizarbtn.classList.add("visible");
    actualizarbtn.classList.remove("invisible");

    var titulo = document.getElementById("titulo");
    titulo.removeAttribute("readonly");
    var objetivo = document.getElementById("objetivo");
    objetivo.removeAttribute("readonly");
    var descripcion = document.getElementById("descripcion");
    descripcion.removeAttribute("readonly");
    var coordinador = document.getElementById("coordinador");
    coordinador.removeAttribute("disabled");
    var fecha_inicio = document.getElementById("fecha_inicio");
    fecha_inicio.removeAttribute("readonly");
    var estatus = document.getElementById("estatus");
    estatus.removeAttribute("disabled");
    titulo.focus();
    

}

function actualizarProyecto(){
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
        var objetivo = document.getElementById("objetivo");
        if(objetivo.value == ""){
            objetivo.classList.add("is-invalid");
            valido = false;
        }else{
            objetivo.classList.remove("is-invalid");
            objetivo.classList.add("is-valid");
            valido = true;
        }
        var descripcion = document.getElementById("descripcion");
        if(descripcion.value == ""){
            descripcion.classList.add("is-invalid");
            valido = false;
        }else{
            descripcion.classList.remove("is-invalid");
            descripcion.classList.add("is-valid");
            valido = true;
        }
        var coordinador = document.getElementById("coordinador");
        if(coordinador.value == ""){
            coordinador.classList.add("is-invalid");
            valido = false;
        }else{
            coordinador.classList.remove("is-invalid");
            coordinador.classList.add("is-valid");
            valido = true;
        }
        var fecha_inicio = document.getElementById("fecha_inicio");
        if(fecha_inicio.value == ""){
            fecha_inicio.classList.add("is-invalid");
            valido = false;
        }else{
            fecha_inicio.classList.remove("is-invalid");
            fecha_inicio.classList.add("is-valid");
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

/** Colaboradores */
function agregarColaboradores(cant_colab){
    var id_proy =  document.getElementById("id_proyecto").value;
    for ($i = 0; $i < cant_colab; $i++){
        var colab = document.getElementById("colab_" + $i);
        if(colab.checked){
            var valores = colab.value.split("&");
            datos = "id_proyecto="+id_proy+"&id_investigador="+valores[0]+"&correo="+ valores[1];
            var ax = axios.create();
            var url = "agregarColaborador.php";
            ax.post(url, datos).then(done =>{
                console.log("guardado: " + valores[1] + " - id_colaborador: " + done.data);
            }).catch(error =>{
                console.log(error);
            });
        }
    }
    document.location.href="detalles.php?id=" + id_proy;
}

function eliminarColaborador(id_proy, id_inv){
    if(confirm("Desea eliminar al colaborador?")){
        var url = "eliminarColaborador.php?id_proyecto=" + id_proy + "&id_investigador=" + id_inv;
        var ax = axios.create();
        ax.get(url).then(done =>{
            console.log(done);
        }).catch(error =>{
            console.log(error);
        });
        document.location.href="detalles.php?id=" + id_proy;
    }
}

/** Servicio Social */
function agregarServicioSocial(cant_ss){
    var id_proy =  document.getElementById("id_proyecto").value;
    for ($i = 0; $i < cant_ss; $i++){
        var ss = document.getElementById("ss_" + $i);
        if(ss.checked){
            var valores = ss.value.split("&");
            datos = "id_proyecto="+id_proy+"&id_estudiante="+valores[0]+"&correo="+ valores[1];
            var ax = axios.create();
            var url = "agregarServicioSocial.php";
            ax.post(url, datos).then(done =>{
                console.log("guardado: " + valores[1] + " - id_estudiante: " + done.data);
            }).catch(error =>{
                console.log(error);
            });
        }
    }
    document.location.href="detalles.php?id=" + id_proy;
}

function eliminarServicioSocial(id_proy, id_est, correo){
    if(confirm("Desea eliminar al servicio social del proyecto?")){
        var url = "eliminarServicioSocial.php?id_proyecto=" + id_proy + "&id_estudiante=" + id_est + "&correo=" + correo;
        var ax = axios.create();
        ax.get(url).then(done =>{
            console.log(done.data);
        }).catch(error =>{
            console.log(error);
        });
        document.location.href="detalles.php?id=" + id_proy;
    }
}



/** Redidencias */
function agregarResidente(cant_ss){
    var id_proy =  document.getElementById("id_proyecto").value;
    for ($i = 0; $i < cant_ss; $i++){
        var ss = document.getElementById("res_" + $i);
        if(ss.checked){
            var valores = ss.value.split("&");
            datos = "id_proyecto="+id_proy+"&id_estudiante="+valores[0]+"&correo="+ valores[1];
            var ax = axios.create();
            var url = "agregarResidente.php";
            ax.post(url, datos).then(done =>{
                console.log("guardado: " + valores[1] + " - id_estudiante: " + done.data);
            }).catch(error =>{
                console.log(error);
            });
        }
    }
    document.location.href="detalles.php?id=" + id_proy;
}

function eliminarResidente(id_proy, id_est, correo){
    if(confirm("Desea eliminar al residente del proyecto?")){
        var url = "eliminarResidente.php?id_proyecto=" + id_proy + "&id_estudiante=" + id_est + "&correo=" + correo;
        var ax = axios.create();
        ax.get(url).then(done =>{
            console.log(done.data);
        }).catch(error =>{
            console.log(error);
        });
        document.location.href="detalles.php?id=" + id_proy;
    }
}


/** Redidencias */
function agregarEstancia(cant_ss){
    var id_proy =  document.getElementById("id_proyecto").value;
    for ($i = 0; $i < cant_ss; $i++){
        var ss = document.getElementById("res_" + $i);
        if(ss.checked){
            var valores = ss.value.split("&");
            datos = "id_proyecto="+id_proy+"&id_estudiante="+valores[0]+"&correo="+ valores[1];
            var ax = axios.create();
            var url = "agregarResidente.php";
            ax.post(url, datos).then(done =>{
                console.log("guardado: " + valores[1] + " - id_estudiante: " + done.data);
            }).catch(error =>{
                console.log(error);
            });
        }
    }
    document.location.href="detalles.php?id=" + id_proy;
}

function eliminarEstancia(id_proy, id_est, correo){
    if(confirm("Desea eliminar al residente del proyecto?")){
        var url = "eliminarResidente.php?id_proyecto=" + id_proy + "&id_estudiante=" + id_est + "&correo=" + correo;
        var ax = axios.create();
        ax.get(url).then(done =>{
            console.log(done.data);
        }).catch(error =>{
            console.log(error);
        });
        document.location.href="detalles.php?id=" + id_proy;
    }
}

