<?php

// Use namespace
// namespace Sinatra
require 'Response.php';
require 'Request.php';
require 'JsonResponse.php';

class Router
{
    public static $callbacks;
    public static $rootUri = '/app.php';

    public static function addRoute($uri, $callback, $httpMethod)
    {
        $uriKey = self::$rootUri . $uri;

        self::$callbacks[$httpMethod][$uriKey] = $callback;
    }

    public static function get($uri, $callback)
    {
        self::addRoute($uri, $callback, 'GET');
    }
    public static function post($uri, $callback)
    {
        self::addRoute($uri, $callback, 'POST');
    }

    public static function init()
    {
        $request  = new Request();
        $requestUri = $request->getUri();
        $httpMethod = $request->getHttpMethod();

        $response = new Response([
            'statusCode' => 404,
        ]);

        if (array_key_exists($requestUri, self::$callbacks[$httpMethod])) {
            $requestedCallback = self::$callbacks[$httpMethod][$requestUri];

            $response = new Response([
                'callback' => $requestedCallback
            ]);
            return $response->write(new JsonResponse);
        }
        return $response->write(new JsonResponse);
    }
}
