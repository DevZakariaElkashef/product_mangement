<?php

function SE_input($key,$value){

    $_SESSION[$key] = $value;
    
}

//  echo SE_input($name,'ahmed');


function SE_remove($key){
  if(isset($_SESSION[$key])){
      unset($_SESSION[$key]) ;
  }
}

function SE_display_error($error){
    
    if (isset($_SESSION[$error])){
        return $_SESSION[$error];
    }else{
        return [];
    }

}
function SE_success($success){
    
    if (isset($_SESSION[$success])){
        return $_SESSION[$success];
    }else{
        return null;
    }

}

// type session and remove it after displaying