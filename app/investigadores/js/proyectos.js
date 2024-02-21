function detalles(id){
    document.location.href="detalles.php?id=" + id;
}

async function guardarActividad(id){
    let actividad = document.getElementById("actividad");
    let fecha_inicio = document.getElementById("fecha_inicio");
    let fecha_fin = document.getElementById("fecha_fin");
    let asignado = document.getElementById("asignado");

    let ax = axios.create();
    let url = "guardarActividad.php";
    let formData = new FormData();

    formData.append("id_proyecto", id);
    formData.append("actividad", actividad.value);
    formData.append("fecha_inicio", fecha_inicio.value);
    formData.append("fecha_fin", fecha_fin.value);
    formData.append("asignado", asignado.value);

    try {
        const res = await ax.post(url, formData);
    
        const result = {
          status: res.status + "-" + res.statusText,
          headers: res.headers,
          data: res.data
        };
    
        console.log(res.data);
        document.location.reload();

      } catch (err) {
        console.log(err);
      }

}

async function mostrarActividad(idp, ida){
  let ax = axios.create();
  let contenido = document.getElementById("content" + ida);
  let ico = document.getElementById("ico" + ida);
  let res = ico.classList.toggle('fa-caret-right');
  if(!res){
    ico.classList.add('fa-caret-down');
    let url = "actividades.php?idp=" + idp + "&ida=" + ida;
    try{
      let datos = await ax.get(url);
      contenido.innerHTML = datos.data;
    }
    catch(error){
      console.log(error);
    }
  }

}