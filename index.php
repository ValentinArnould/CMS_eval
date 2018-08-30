<?php
include_once('helpers/ConfigHelper.php');
//affiche les erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    session_start();
    spl_autoload_register(function($className) {
        $directory = '';
        if(strpos($className, 'Helper')) {
            $directory = 'helpers';
        } else if(strpos($className, 'Controller')){
            $directory = 'controllers';
        } else if(strpos($className, 'Model')) {
            $directory = 'models';
        } else {
            throw new \Exception("Error including class. Check your code");
        }
        include './' . $directory . '/' . $className . '.php';
    });
    RouteHelper::getRoute();
