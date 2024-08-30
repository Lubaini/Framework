<?php 

namespace Route;

require 'config/autoloader.php';

use Config\Route;

define('ROOTDIR', basename(__DIR__), FALSE);
define('HOST', $_SERVER['HTTP_HOST'], FALSE);

files_group();

$OBJ = new Route();

$OBJ->view();
