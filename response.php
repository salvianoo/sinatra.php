<?php

class Response
{
    private $statusCode;
    private $callback;
    private $requestUri;

    public function __construct($params)
    {
        $this->callback   = isset($params['callback']) ? $params['callback'] : null; 
        $this->statusCode = isset($params['statusCode']) ? $params['statusCode'] : 200;
    }

    public function write(): string
    {
        header('Content-Type: application/json');
        
        if (! is_null($this->callback)) {
            $closureObject = $this->callback;
            return json_encode($closureObject());
        } 
        return json_encode('Request Not Found');
    }
}