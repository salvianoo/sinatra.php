<?php

class Response
{
    private $statusCode;
    private $callback;

    public function __construct($params)
    {
        $this->callback   = isset($params['callback']) ? $params['callback'] : null;
        $this->statusCode = isset($params['statusCode']) ? $params['statusCode'] : 200;
    }

    //IoC
    public function write(IFormatter $formatter): string
    {
        header('Content-Type: application/json');

        if (! is_null($this->callback)) {
            $closureCallback = $this->callback;
            return $formatter->format($closureCallback());
        }
        return $formatter->format('Request Not Found');
    }
}
