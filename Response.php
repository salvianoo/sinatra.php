<?php

class Response
{
    private $statusCode;
    private $callback;

    public function __construct($params)
    {
        // PHP 7.0+
        $this->callback     = $params['callback'] ?? null;
        $this->callbackArgs = $params['callbackArgs'] ?? null;
        $this->statusCode   = $params['statusCode'] ?? 200;
    }

    //IoC
    public function write(IFormatter $formatter): string
    {
        header('Content-Type: application/json');

        $closureCallback = $this->callback;
        $closureArgs     = $this->callbackArgs;

        if (! is_null($closureCallback) ) {

            return $formatter->format($closureCallback());

        } elseif (! ( is_null($closureCallback) && is_null($closureArgs))) {

            var_dump($closureArgs);

            return $formatter->format($closureCallback($closureArgs));

        }
        return $formatter->format('Request Not Found');
    }
}
