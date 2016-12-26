<?php

class Request
{
    public function getHttpMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getInput()
    {
        return $_POST;
    }
}
