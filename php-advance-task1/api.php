<?php
// api class
class API
{

    // this function calls the result and return result as a php object
    public function getData($url)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: text/plain",

                ),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
            )
        );
        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response);
        return $result;
    }
}
?>