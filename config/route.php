<?php 

namespace Config;

class Route {
    
    public function view()
    {
        // defining classes for methods passed in url
        if (isset($_GET['page'])) {

                switch ($_GET['page']) {

                    case 'home':
                        $this->run('Home', $_GET['page']);
                        break;

                    case 'login':
                        $this->run('Users', $_GET['page']);
                        break;

                    case 'account':
                        $this->run('Users', $_GET['page']);
                        break;
                            
                    
                    default:
                        error('undefined method: '.$_GET['page']);
                        break;
                }

        } else {

            $this->run('Home', 'index');
        }

    }
    
    public function run($class, $method)
    {
        // checking if file exists with associated class name
        /* All files in controller must be namespaced as controller */
        if (file_exists('controller/'.$class.'.php')) {

            $namespaced = 'controller\\'.$class;

            if (class_exists($namespaced)) {
    
                    $class__ = new $namespaced();

                    if (method_exists($class__, $method)) {
                        
                        $class__->$method();

                    } else {

                        error('Method not found');
                    }

            } else {
                
                error('class: '.$namespaced.' :not found');

            }

        } else {

            error($class.': Class not found or file might have been renamed');

        }
    }
}