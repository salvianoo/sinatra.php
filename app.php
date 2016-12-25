<?php

//use \Sinatra;
require 'Router.php';

$artists = [
    array('nome' => 'The Beatles'),
    array('nome' => 'U2'),
    array('nome' => 'Garbage'),
];

Router::get('/lineup', function() use ($artists) {
    return [
        'artists' => $artists
    ];
});

Router::post('/artists', function() use ($artists) {
    return [
        'artists' => $artists
    ];
});

echo Router::init();
