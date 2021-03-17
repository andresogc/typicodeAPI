<?php

class User{
    private $id;
    private $name;
    private $email;
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



     //solicitar  todos los  usuarios a la api
    public function get(){

        $users = Api::get($this->getSlug());
        
        if($users){
            return $users;
        }

        return 'error';
        
    }

    //Obtener un usuario especifico 
    public function getUser($id){
        $user = Api::get($this->getSlug());
        
        if($user){
            return $user;
        }

        return 'error';

    }
    

}