<?php 

namespace Controller;

class Users extends baseController {

    public function account()
    {
        return view('pages/account');
    }

    public function create()
    {
        return view('pages/review');
    }

    public function retrieve()
    {
        return view('pages/review');
    }

    public function edit()
    {
        return view('pages/review');
    }

    public function delete__()
    {
        return view('pages/review');
    }

    public function login()
    {
        if (isset($_POST['login'])) {

            $this->VALIDATE_EMAIL($_POST['email']);
            $this->VALIDATE_PASSWORD($_POST['password']);

            if (count($this->valid_data) == 2) {

                $data = $this->runQuery($this->select('users', ['email', 'password']), 
                                    [$_POST['email'], md5($_POST['password'])]);
            
                if(count($data) > 0){
                    
                    session_start();
                    $_SESSION['USER'] = $data;
                    
                } else {
                    echo 'failed';
                }

            } else {
                echo 'invalid';
            }
            
            
            exit();
        }
        
        return view('pages/home');
    }
}
