function editarPerfil(){
    let matricula = document.getElementById("matricula");
    let nombres = document.getElementById("nombres");
    let apellido_1 = document.getElementById("apellido_1");
    let apellido_2 = document.getElementById("apellido_2");
    let correo = document.getElementById("correo");
    let correo_adicional = document.getElementById("correo_adicional");
    let telefono = document.getElementById("telefono");
    let division = document.getElementById("division");

    matricula.removeAttribute("readonly");
    nombres.removeAttribute("readonly");
    apellido_1.removeAttribute("readonly");
    apellido_2.removeAttribute("readonly");
    correo.removeAttribute("readonly");
    correo_adicional.removeAttribute("readonly");
    telefono.removeAttribute("readonly");
    division.removeAttribute("disabled");

    var editarbtn = document.getElementById("editarbtn");
    var actualizarbtn = document.getElementById("actualizarbtn");
    editarbtn.classList.remove("visible");
    editarbtn.classList.add("invisible");
    actualizarbtn.classList.add("visible");
    actualizarbtn.classList.remove("invisible");
}

function cancelarEditarPerfil(){
    let matricula = document.getElementById("matricula");
    let nombres = document.getElementById("nombres");
    let apellido_1 = document.getElementById("apellido_1");
    let apellido_2 = document.getElementById("apellido_2");
    let correo = document.getElementById("correo");
    let correo_adicional = document.getElementById("correo_adicional");
    let telefono = document.getElementById("telefono");
    let division = document.getElementById("division");

    matricula.setAttribute("readonly","readonly");
    nombres.setAttribute("readonly","readonly");
    apellido_1.setAttribute("readonly","readonly");
    apellido_2.setAttribute("readonly","readonly");
    correo.setAttribute("readonly","readonly");
    correo_adicional.setAttribute("readonly","readonly");
    telefono.setAttribute("readonly","readonly");
    division.setAttribute("disabled","disabled");

    var editarbtn = document.getElementById("editarbtn");
    var actualizarbtn = document.getElementById("actualizarbtn");
    editarbtn.classList.add("visible");
    editarbtn.classList.remove("invisible");
    actualizarbtn.classList.remove("visible");
    actualizarbtn.classList.add("invisible");
}

function actualizarPerfil(){
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

function validarPassword(){
    var password = document.getElementById("password");
    var password2 = document.getElementById("password2");

    if(password.value == ""){
        password.classList.remove("is-valid");
        password.classList.add("is-invalid");
        return false;
    }
    if(password2.value == ""){
        password2.classList.remove("is-valid");
        password2.classList.add("is-invalid");
        return false;
    }

    if(password.value != password2.value){
        password2.classList.remove("is-valid");
        password2.classList.add("is-invalid");
        return false;
    }else{
        password2.classList.remove("is-invalid");
        password2.classList.add("is-valid");
        let form = document.getElementById("cambio");
        form.classList.add('was-validated');
        form.method="post";
        form.action="cambiarPass.php";
        form.submit();
        return true;
    }

}

function editarPrograma(){
    let fecha_inicio = document.getElementById("fecha_inicio");
    let fecha_fin = document.getElementById("fecha_fin");

    fecha_inicio.removeAttribute("readonly");
    fecha_fin.removeAttribute("readonly");

    var editarProgbtn = document.getElementById("editarProgbtn");
    var actualizarProgbtn = document.getElementById("actualizarProgbtn");
    editarProgbtn.classList.remove("visible");
    editarProgbtn.classList.add("invisible");
    actualizarProgbtn.classList.add("visible");
    actualizarProgbtn.classList.remove("invisible");
}
function cancelarEditarPrograma(){
    let fecha_inicio = document.getElementById("fecha_inicio");
    let fecha_fin = document.getElementById("fecha_fin");

    fecha_inicio.setAttribute("readonly","readonly");
    fecha_fin.setAttribute("readonly","readonly");

    var editarProgbtn = document.getElementById("editarProgbtn");
    var actualizarProgbtn = document.getElementById("actualizarProgbtn");
    editarProgbtn.classList.add("visible");
    editarProgbtn.classList.remove("invisible");
    actualizarProgbtn.classList.remove("visible");
    actualizarProgbtn.classList.add("invisible");
}
function actualizarPrograma(){
    const forms = document.querySelectorAll('.needs-validation');
  
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        var valido = false;
        var fecha_inicio = document.getElementById("fecha_inicio");
        if(fecha_inicio.value == ""){
            fecha_inicio.classList.add("is-invalid");
            valido = false;
        }else{
            fecha_inicio.classList.remove("is-invalid");
            fecha_inicio.classList.add("is-valid");
            valido = true;
        }
        var fecha_fin = document.getElementById("fecha_fin");
        if(fecha_fin.value == ""){
            fecha_fin.classList.add("is-invalid");
            valido = false;
        }else{
            fecha_fin.classList.remove("is-invalid");
            fecha_fin.classList.add("is-valid");
            valido = true;
        }

        form.classList.add('was-validated');
        if(valido){
            var id_estudiante = document.getElementById("id_estudiante");
            form.method="post";
            form.action="actualizarPrograma.php?id_estudiante=" + id_estudiante.value;
            return true;
        }else{
            return false;
        }
        
      }, false)
    });
}

async function subirArchivo(fileInput){
    const ax = axios.create();
    let messageElement = document.getElementById("message");
    messageElement.innerHTML = "";

  const selectedFile = document.querySelector("#" + fileInput).files;

  let formData = new FormData();
  formData.append("nombre", "carta_de_" + fileInput);
  formData.append("archivo", selectedFile[0]);

  document.getElementById("progress").style.display = "flex";
  let progressBarElement = document.getElementById("progress-bar");
  progressBarElement.innerHTML = "0%";
  progressBarElement.setAttribute("aria-valuenow", 0);
  progressBarElement.style.width = "0%";

  const onUploadProgress = (event) => {
    const percentage = Math.round((100 * event.loaded) / event.total);
    progressBarElement.innerHTML = percentage + "%";
    progressBarElement.setAttribute("aria-valuenow", percentage);
    progressBarElement.style.width = percentage + "%";
  };

  try {
    const res = await ax.post("documentos/", formData, {
        header:{
            'Content-Type': 'multipart/form-data'
        },
        onUploadProgress,
    });

    const result = {
      status: res.status + "-" + res.statusText,
      headers: res.headers,
      data: res.data
    };

    messageElement.innerHTML = htmlizeResponse(result);
  } catch (err) {
    messageElement.innerHTML = htmlizeResponse(err);
  }
}

function htmlizeResponse(res) {
    return (
      `<div class="alert alert-secondary mt-2" role="alert"><pre>` +
      JSON.stringify(res, null, 2) +
      "</pre></div>"
    );
}

function verActividad(id){
    document.location.href="actividad.php?id=" + id;
}

function porcentaje(){
    let avance = document.getElementById("avance").value;
    let valor = document.getElementById("valor");
    valor.innerHTML = "<strong>" + avance + "%</strong>";
}

async function agregarActividad(ida, idp, ide, correo, programa, semestre){
    //alert(ida + " - " + idp + " - " + ide + " - " + correo + " - " + programa + " - " + semestre);
    let actividad = document.getElementById("actividad").value;
    let fecha_inicio = document.getElementById("fecha_inicio").value;
    let fecha_fin = document.getElementById("fecha_fin").value;
    let avance = document.getElementById("avance").value;

    let ax = axios.create();
    let url = "guardarActividad.php";

    let formData = new FormData();
    formData.append("id_actividad", ida);
    formData.append("id_proyecto", idp);
    formData.append("id_estudiante", ide);
    formData.append("correo", correo);
    formData.append("programa", programa);
    formData.append("semestre", semestre);
    formData.append("actividad", actividad);
    formData.append("fecha_inicio", fecha_inicio);
    formData.append("fecha_fin", fecha_fin);
    formData.append("avance", avance);

    try{
        let res = await ax.post(url, formData);
        console.log(res.data);
        document.location.reload();
    }
    catch(error){
        console.log(error);
    }

}