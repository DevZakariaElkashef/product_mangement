<?php 

    function is_requiredVal($val){
        return empty($val);
    }

    function is_minValue($str, $minValue){
        $str = trim($str);
        $str = filter_var($str, FILTER_SANITIZE_STRING);

        if(strlen($str)<$minValue){
            return false;
        }
        return true;

    }

    function is_maxValue($str, $maxValue){

        $str = trim($str);
        $str = filter_var($str, FILTER_SANITIZE_STRING);


        if(strlen($str)>$maxValue){
            return false;
        }
        return true;

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