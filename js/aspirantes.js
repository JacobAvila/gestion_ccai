function aceptarAspirante(id, correo){
    let ax = axios.create();
    let url = "aceptar.php?id=" + id + "&correo=" + correo;
    ax.get(url).then(done =>{
        let estatus = document.getElementById("estatus_" + id);
        estatus.innerHTML = "Aceptado";
        console.log("Aceptado");
    }).catch(error =>{
        console.log(error);
    });

}

function rechazarAspirante(id, correo){
    let ax = axios.create();
    let url = "rechazar.php?id=" + id + "&correo=" + correo;
    ax.get(url).then(done =>{
        let estatus = document.getElementById("estatus_" + id);
        estatus.innerHTML = "Rechazado";
    }).catch(error =>{
        console.log(error);
    });

}