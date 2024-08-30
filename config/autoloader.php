<?php 

function files_group() {

    require 'config/configurations.php';
    require 'config/helpers.php';
}

spl_autoload_register(function($class) {
    
    if (!file_exists($class.'.php')) {

        error('File not found');

    } else {

        include_once $class.'.php';

    }  
});

