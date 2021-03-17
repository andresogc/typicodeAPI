<?php

function controller_autoload($classname){
    include 'controllers/' . $classname . '.php';//entramos a carpeta de controladores y los incluimos
}


spl_autoload_register('controller_autoload');