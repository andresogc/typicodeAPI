<?php
require_once 'models/todo.php';
require_once 'models/user.php';

class TodoController{
    
    //obtener TODOS de un usuario en especifico
    public function getAllTodosToUser(){
        
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $todo = new Todo();
            $todo->setSlug('todos?userId='.$id);//slug para saber a que url hacer la peticion
            $userTodos=$todo->getTodosToUser();

             //obtener datos del usuario
            $userId=$userTodos[0]->{'userId'};
            $user=$this->getUser($userId);
            
            //vista a mostrar
            require_once 'views/todo/show.php';
        }
    }

    //Guardar nueva TODO
    public function save(){
        if (isset($_POST)) {
            
            $action="creado";//inidcar que accion se ejectuo y segun la accion mostrar en pantalla cual fue
            //obtner datos del form y solicitar guardar
            $todo = new Todo();
            $todo->setTitle($_POST['title']);
            $todo->setUserId($_POST['userId']);
            $todo->setCompleted(false);
            $todo->setSlug('todos');//slug para saber a que url hacer la peticion
            $save = $todo->save();

            //obtener datos del usuario
            $userId=$save->{'userId'};
            $user=$this->getUser($userId);


            if($save){
                //vista a mostrar
                require_once 'views/todo/saveResult.php';
            }else{
                echo "No fue posible crear la nueva ToDo"; 
            }
        }

    }

     //mostrar formulario con los datos a editar de una TODO
    public function showFormUpdate(){

        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $userId=$_GET['userId'];

            //obtener TODO
            $todoResult=$this->getTodo($id);

            //obtener user
            $user=$this->getUser($userId);
            //vista a mostrar
            require_once 'views/todo/edit.php';
        }

    }


    //actualizar una TODO
    public function update(){

        if (isset($_POST)) {
            $action="actualizado";//inidcar que accion se ejectuo y segun la accion mostrar en pantalla cual fue
            $todo = new Todo();
            
            
            //Obtener el estado del TODO
            $completed=true;
            if($_POST['completed']=='false'){
                $completed=false;
            }
            //obtener los datos a actualizar  del form
            $todo->setTitle($_POST['title']);
            $todo->setCompleted($completed);
            $todo->setUserId($_POST['userId']);
            $todo->setSlug('todos/'.$_POST['id']);//slug para saber a que url hacer la peticion
            $save = $todo->put();
           
            //obtener datos del usuario
            $userId=$save->{'userId'};
            $user=$this->getUser($userId);
           
            if($save){
                //vista a mostrar
                require_once 'views/todo/saveResult.php';
            }else{
                echo "No fue posible actualizar la  ToDo"; 
            }
            
        }
    }

    //eliminar una TODO
    public function deleteTodo(){
        if (isset($_GET)) {
            $action="eliminado";
            $todo = new Todo();
            $todo->setSlug('todos/'.$_GET['id']);//slug para saber a que url hacer la peticion

            //obtener TODO que se va a eliminar para mostrar en pantalla los datos de la TODO eliminada
            $save=$this->getTodo($_GET['id']);
            //eliminando TODO
            $delete = $todo->deleteTodo();
            //obtener datos del usuario 
            $userId = $_GET['userId'];
            $user=$this->getUser($userId);
           
            if($delete){
                //vista a mostrar
                require_once 'views/todo/saveResult.php';
            }else{
                echo "No fue posible eliminar la  ToDo"; 
            }
            
        }
    }

    //obtener una sola todo por id
    public function getTodo($id){
        $todo = new Todo();
        $todo->setSlug('todos/'.$id);//slug para saber a que url hacer la peticion
        $todoResult=$todo->getTodo();
        return $todoResult;

    }

    //obtener usuario especifico
    public function getUser($userId){
        $user=new User();
        $user->setSlug('users/'.$userId);//slug para saber a que url hacer la peticion
        $resultUser=$user->getUser($userId);
        return $resultUser;
    }

}