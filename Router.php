<?php

// Use namespace
// namespace Sinatra
require 'Response.php';
require 'Request.php';
require 'JsonResponse.php';

class Router
{
    public static $callbacks = [];
    public static function addRoute($uri, $callback)
    {
        $rootUri = '/app.php';

        $uriKey = $rootUri . $uri;
        self::$callbacks[$uriKey] = $callback;
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
            return $response->write(new JsonResponse);
        }
        return $response->write(new JsonResponse);
    }
}
// if (HTTP_METHOD === 'POST') {
//
// }
// if (HTTP_METHOD === 'GET') {
//     $queryString =
// }

