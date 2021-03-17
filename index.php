<?php

require_once 'autoload.php';//obtenemos acceso a todos los controladores
require_once 'config/api.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/navBar.php';


function showError(){
    $error = new errorController();
    $error->index();
}

//validar si estadefnido get
if (isset($_GET['controller']) ) {
    $controller_name = $_GET['controller'].'Controller';
}elseif(!isset( $_GET['controller']) && !isset($_GET['action'])){
    $controller_name = controller_default;
}else{
    
    showError();
    exit();
}

//verificar si existe la clase o controlador
if(class_exists($controller_name)){
    $controller = new $controller_name;
    //verificar si existe el metodo o accion en elcontrolador
    if (isset($_GET['action']) && method_exists($controller, $_GET['action']) ) {
        $action=$_GET['action'];
        $controller->$action();
    }elseif(!isset( $_GET['controller']) && !isset($_GET['action'])){
        $action_default=action_default;
        $controller->$action_default();
    }else{
        showError();
    }
}else {
    showError();
}


require_once 'views/layout/footer.php';
