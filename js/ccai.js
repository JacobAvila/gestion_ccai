(() => {
    'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

function login(event){
    let ax = axios.create();
    var valido = false;
    var correo = document.getElementById("correo");
        if(correo.value == ""){
            correo.classList.add("is-invalid");
        }else{
            let url="ingreso/checkmail.php";
            let params = "correo=" + correo.value;
            ax.post(url, params).then(res =>{
                if(res.data === 0){
                    correo.classList.remove("is-valid");
                    correo.classList.add("is-invalid");
                }else{
                    correo.classList.remove("is-invalid");
                    correo.classList.add("is-valid");
                    var password = document.getElementById("password");
                    if(password.value == ""){
                        password.classList.remove("is-valid");
                        password.classList.add("is-invalid");
                    }else{
                        let valores = res.data.split("&");
                        if(valores[0] !== password.value){
                            password.classList.remove("is-valid");
                            password.classList.add("is-invalid");
                        }else if(valores[1] === "Inactivo"){
                            password.classList.remove("is-valid");
                            password.classList.add("is-invalid");
                            document.getElementById("msg_pass").innerHTML = "Usuario Inactivo";
                        }else{
                            password.classList.remove("is-invalid");
                            password.classList.add("is-valid");
                            valido = true;
                        }

                        if(valido){
                            event.method="post";
                            event.action="ingreso/login.php";
                            event.submit();
                            return true;
                        }else{
                            return false;
                        }
                    }
                }
            }).catch(error =>{
                console.log(error);
            });
        }
        return false;
}
