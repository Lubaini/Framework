<?php 

const VIEWS = 'views/';

function error($msg) {
   
   require_once 'views/error/error.php';
}

//for form action
function _here() {

   return $_SERVER['PHP_SELF'];
}

function view($path, $data = null) {

   if (file_exists('views/'.$path.'.php')) {

      require_once 'views/'.$path.'.php';

   } else {

      error($path.': Page not found');
      exit();

   }
}

function URL($page) {   
     
   return 'http://'.HOST.'/'.ROOTDIR.'/'.'index.php?page='.$page;

}