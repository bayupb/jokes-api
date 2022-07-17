<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return '<center><h1><b>Selamat Datang di API JOKES</b></h1></center> <br/>' .
        ' <center><h4>Cuma suka sama jokes? Kenapa sama aku ga suka ? Sad, mending ngejokes. （︶^︶）</h4></center> <br/>' .
        '<center><a href="https://stackoverflow.com/questions/36581457/ckanapi-create-line-break-using-markdown">Github Jokes</a></center>';
});

require 'jokes-api.php';
