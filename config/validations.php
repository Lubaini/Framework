<?php 
declare(strict_types = 1);

namespace Config;

trait Validations {

	protected $valid_data  = [];
	protected $invalid_data = [];
	

	protected function VALIDATE_STRING($value, $name)
	{
      if ($value == '' || $value == NULL) {
        
        $this->error[$name] = $name." cannot be empty.";
        return $this->error[$name];

      } elseif(strlen($value) < 1){

        $this->error[$name] = $name." cannot be less than 2.";
        return $this->error[$name];
        
      } elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value)) {

        $this->error[$name] = $name." cannot contain special characters.";
        return $this->error[$name];

      } elseif (is_numeric($value)) {

        $this->error[$name] = $name." cannot contain digits.";
        return $this->error[$name];

      } else {

        array_push($this->valid_data, $value);
    
      }
  }
  protected function VALIDATE_RAND_VAL($value, $name)
	{
      if ($value == '' || $value == NULL) {
        
        $this->error[$name] = $name." cannot be empty.";
        return $this->error[$name];

      } elseif(strlen($value) < 1){

        $this->error[$name] = $name." cannot be less than 2.";
        return $this->error[$name];
        
      } else {

        array_push($this->valid_data, $value);
    
      }
  }

  protected function VALIDATE_DESCRIPTION($value, $name)
	{
      if ($value == '' || $value == NULL) {
        
        $this->error[$name] = $name." cannot be empty.";
        return $this->error[$name];

      } else {

        array_push($this->valid_data, $value);
    
      }
  }

    protected function VALIDATE_EMAIL($email)
    {
        if ($email == '' || $email == NULL) {

          $this->error['email'] = "Email cannot be empty.";
          return $this->error['email'];

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

          $this->error['email'] = "Invalid Email.";
          return $this->error['email'];

        } else {

          array_push($this->valid_data, $email);
      
        }
    }

    protected function VALIDATE_NUM($num)
    {
        if (!is_numeric($num) && $num == NULL) {

          array_push($this->valid_data, $num);

        } elseif(!is_numeric($num)) {

          $this->error['num'] = "This field accepts digits only.";
          return $this->error['num'];
      
        } else {
          array_push($this->valid_data, $num);
        }
    }

    protected function VALIDATE_PASSWORD($password)
    {
        if ($password == '' || $password == NULL) {

             $this->error['password'] = "Password cannot be empty";
             return $this->error['password'];

        } elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {

             $this->error['password'] = "Provide at least one special character";
             return $this->error['password'];

        } else {

            array_push($this->valid_data, md5($password));
         
        }
    }
  }