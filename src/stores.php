<?php

class Stores {
    
    private $api;
    
    public function __construct($api) {
        $this->api = $api;
    }
    
    public function get() {
        
        $result = $this->api->get('/v1/stores');
        
        // successful GET request 
        if ($result->info->http_code === 200) {
            // return the raw JSON response
            return $result->response;
        }
    }
}