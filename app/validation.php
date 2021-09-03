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

function filter_email($val){
    return filter_var($val, FILTER_VALIDATE_EMAIL);

}





?>