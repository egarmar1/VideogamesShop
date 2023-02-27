<?php

function CheckRegister($name,$lastname,$email,$password){
    
    if(is_numeric($name) || preg_match("/[0-9]/", $name)){
        $_SESSION['error']="The name cann't be numeric";
    }
    
    if(is_numeric($lastname) || preg_match("/[0-9]/", $lastname)){
        $_SESSION['error']="The lastname cann't be numeric";
    }
    
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['error']='Invalid email';
    }
    
    if(isset($_SESSION['error'])){
        return false;
    }else{
        return true;
    }
  
    
}
