<?php

namespace App\Services;

class CurlService
{
    /**
     * @param  String $url
     * @return String
     */
    public function curlGet($url)
    {   
        $ci = curl_init();
        
        curl_setopt($ci, CURLOPT_URL, $url);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($ci);

        if(curl_exec($ci) == false){
            echo 'Curl error: '.curl_error($ci);
        }
        
        curl_close($ci);

        return $response;
    }
}
