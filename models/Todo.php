<?php

class Todo{
    private $id;
    private $userId;
    private $title;
    private $completed;
    private $urlApi;
    private $slug;
   

    //getters

    function getTitle(){
        return $this->title;
    }

    function getUserId(){
        return $this->userId;
    }

    function getCompleted(){
        return $this->completed;
    }

    function getSlug(){
        return $this->slug;
    }

    //setters

    function setTitle($title){
        $this->title=$title;
    }

    function setUserId($userId){
        $this->userId=$userId;
    }

    function setCompleted($completed){
        $this->completed=$completed;
    }

    function setSlug($slug){
        $this->slug=$slug;
    }

   
    /****Metodos hacia la api*****/

     //solicitar  todas las  ToDos 
     public function get(){
        //construir array con los datos que se setearon desde el controlador 
        $data_array = array(
            'title' => $this->getTitle(),
            'completed' => $this->getCompleted(),
            'userId'=> $this->getUserId(),
        );
        //solicitud a la api para guardar
        $save = Api::post($data_array,$this->getSlug());
        
        if($save){
            return $save;
        }

        return 'error';
        
    }


     //solicitar  todas las  ToDos de un usuario en especifico por id
     public function getTodosToUser(){
        $userTodos = Api::get($this->getSlug());
        
        if($userTodos){
            return $userTodos;
        }

        return 'error';
        
    }

    //solicitar  guardar ToDo a la api
    public function save(){
        
        $data_array = array(
            'title' => $this->getTitle(),
            'completed' => $this->getCompleted(),
            'userId'=> $this->getUserId(),
        );

        $save = Api::post($data_array,$this->getSlug());

        if($save){
            return $save;
        }

        return 'error';
    }


     //solicitar  actualizar ToDo a la api
    public function put(){
        $data_array = array(
            'title' => $this->getTitle(),
            'completed' => $this->getCompleted(),
            'userId'=> $this->getUserId(),
        );

        $save = Api::put($data_array,$this->getSlug());
        
        if($save){
            return $save;
        }

        return 'error';
        
    }


    //solicitar  eliminar  una ToDo 
    public function deleteTodo(){
        $delete = Api::delete($this->getSlug());

        if($delete){
            return true;
        }
        return false;
    }

    //obtener una sola todo por id
    public function getTodo(){
        $todo = Api::get($this->getSlug());
        
        if($todo){
            return $todo;
        }

        return 'error';
    }

}