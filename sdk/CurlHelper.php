<?php

class CurlHelper {
    private $curl;

    public function __construct(string $url) {
        $this->curl = curl_init($url);
        
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
    }

    public function sendGetRequest() {
        return curl_exec($this->curl);
    }

    public function sendPostRequest(array $fields) {
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $fields);

        return curl_exec($this->curl);
    }
}

?>