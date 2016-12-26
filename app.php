<?php

//use \Sinatra;
require 'Router.php';
// require 'Artist.php';

$artists = [
    array('nome' => 'The Beatles'),
    array('nome' => 'U2'),
    array('nome' => 'Garbage'),
];

Router::get('/lineup', function() use ($artists) {
    return [
        'lineup' => $artists
    ];
});

Router::get('/artists/{id}', function($id) use ($artists) {
    // Use querystring?
    return [
        'artist' => $artists[$id]
    ];
});

Router::post('/artists', function() use ($artists) {
    // create a new artist
    // get post data
    $artists[] = $_POST;

    var_dump($artists);
    // return [
    //     'artists' => $artists
    // ];
});

echo Router::init();
