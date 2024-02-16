<?php
/**
 * Description of daousuario
 *
 * @author Jacob
 */
class DAOUsuario {
    
    public function insertar($correo, $password, $tipo, $foto){
        $q = "INSERT INTO usuario (correo, password, tipo, foto) "
                . "VALUES ('$correo', '$password', '$tipo', '$foto')";
        $db = new Database();
        return $db->insertar($q);
    }

    public function registro($correo){
        $q = "SELECT * FROM usuario WHERE correo = '$correo'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function ingreso($correo, $password){
        $q = "SELECT * FROM usuario WHERE correo = '$correo' and password = '$password'";
        $db = new Database();
        return $db->seleccionar($q);
    }
    public function cambioPassword($correo, $password){
        $q = "UPDATE usuario SET password='$password' WHERE correo='$correo'";
        $db = new Database();
        return $db->actualizar($q);
    }
    
    /**
     * Verifica si el usuario existe o no.
     * Retorna
     *      0 - El usuario no existe
     *      1 - Password Incorrecto
     *      $user - Login Correcto es Investigador
     *      3 - Login Correcto pero es Estudiante Inactivo o Eliminado
     *      $user - Login Correcto es Estudiante Activo
     * @param type $correo
     * @param type $password
     * @return int
     */
    public function login($correo, $password){
        $daoI = new DAOInvestigador();
        $daoE = new DAOEstudiante();
        $password = md5($password);
        $tipo = "Investigador";
        //Checamos si el usuario es investigador
        $usuario = $daoI->registroCorreo($correo);
        
        //Si el usuario no es investigador
        if(!$usuario){
            //Checamos si es estudiante
            $usuario = $daoE->registroCorreo($correo);
            if(!$usuario){
                //El usuario no existe
                return 0;
            }else{
                $tipo = "Estudiante";
            }
        }
        if($password != $usuario->getPassword()){
            return 1;
        }
        //El usuario si existe y el login es correcto
        if($tipo == "Investigador"){
            return $usuario->toArray(); // Es Investigador
        }else if($usuario->getEstatus() == "Inactivo"){
            return 3; // Es Estudiante Inactivo
        }else{
            return $usuario->toArray(); // Es Estudiante Activo
        }
    }
}
