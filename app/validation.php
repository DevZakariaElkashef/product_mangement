<?php 

function required($val){
    if(empty($val)){
    return true;
    }
    return false;
}

function minVal($str, $min){
    if(strlen($str) < $min){
        return true;
    }
    return false;
}

function maxVal($str, $max){
    if(strlen($str) > $max){
        return true;
    }
    return false;
}

function numberVal($value){
    if(is_numeric($value)){
        return true;
    }
    return false;
}

    function is_filtered ($str){
        $str = trim($str);
        $str = filter_var($str, FILTER_SANITIZE_STRING);

        if (!preg_match('/^[a-zA-Z0-9 .]+$/', $str)) {
            return false;
        }
        return true;
    }
    
    function strlen_in_between($min , $max , $str) {

        $str = trim($str);
        $str = filter_var($str, FILTER_SANITIZE_STRING);


        if(!(strlen($str) >= $min && strlen($str) <= $max)) {
            return false;
        } 

        return true;

    }






?>