function detalles(id){
    document.location.href="detalles.php?id=" + id;
}

async function guardarActividad(id){
    let actividad = document.getElementById("actividad");
    let fecha_fin = document.getElementById("fecha_fin");
    let asignado = document.getElementById("asignado");

    let ax = axios.create();
    let url = "guardarActividad.php";
    let formData = new FormData();

    formData.append("actividad", actividad.value);
    formData.append("fecha_fin", fecha_fin.value);
    formData.append("asignado", asignado.value);

    try {
        const res = await ax.post(url, formData);
    
        const result = {
          status: res.status + "-" + res.statusText,
          headers: res.headers,
          data: res.data
        };
    
        console.log(result);
        document.location.reload();

      } catch (err) {
        console.log(err);
      }

}