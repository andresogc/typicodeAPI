<?php
require_once 'models/user.php';

class UserController{
    

    //Obtener lista de todos los usuarios
    public function index(){

        $user = new User();
        $user->setSlug('users');
        $users = $user->get();
        
        //si hay error en la consulta mostrar mensaje. Cuadno devuelve un objeto es poruqe no logro traer datos
        if( gettype($users)=='object'){
            echo "Hubo un error interno, por favor intentelo más tarde"; 
        }
        require_once 'views/user/user.php';
    }
    
    //obtener un uuario en especifico por id
    public function get($id){

        if($id){
            $user = new User();
            $user->setSlug('users/'.$id);
            $result =$user->getUser();
        }
        
        return $result;
        //require_once 'views/todo/show.php';

       
    }

    


   


}