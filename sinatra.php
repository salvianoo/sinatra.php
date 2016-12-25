<?php

// Use namespace
// namespace Sinatra
require 'response.php';
require 'request.php';

class Router
{
    public static $callbacks = [];
    public static function addRoute($uri, $callback)
    {
        $rootUri = '/routes.php';

        $uriKey = $rootUri . $uri;
        self::$callbacks[$uriKey] = $callback;
        // self::$callbacks[] = array($uriKey => $callback);
    }

    public static function get($uri, $callback)
    {
        self::addRoute($uri, $callback);
    }
    public static function post($uri, $callback)
    {
        self::addRoute($uri, $callback);
    }

    public static function init()
    {
        $request  = new Request();

        $response = new Response(array(
            'statusCode' => 404,
        ));

        if (array_key_exists($request->getUri(), self::$callbacks)) {
            $requestedCallback = self::$callbacks[$request->getUri()];

            $response = new Response([
                'callback' => $requestedCallback
            ]);
            return $response->write();
        }
        return $response->write();
    }
}
// if (HTTP_METHOD === 'POST') {
//     
// }
// if (HTTP_METHOD === 'GET') {
//     $queryString = 
// }

