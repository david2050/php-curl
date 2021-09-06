<?php

class cUrl {
    function curl_post($url, $fields) {
            if(is_array(@$fields)){
                foreach (@$fields as $key => $value) {
                   @$fields_string .= $key . '=' . $value . '&';
                }
                rtrim($fields_string, '&');
            }
        
//open connection
        $ch = curl_init();
//set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        if(@$fields){
             curl_setopt($ch, CURLOPT_POST, count($fields));
             curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 

//execute post
        $result = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//close connection
        curl_close($ch);
        $resultado["resultado"] = $result;
        $resultado["http_code"] = $http_code;
        return $resultado;
    }

}