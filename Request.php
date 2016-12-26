<?php

class Request
{
    private $uri;
    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getHttpMethod()
    {
       return $this->method;
    }
}
