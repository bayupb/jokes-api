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

// jokes bapak-bapak
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'v1'], function () use ($router) {
        $router->group(['prefix' => 'jokes-bapak'], function () use ($router) {
            $router->get('/', 'Jokes\JokesBapakController@getList');
            $router->post('/save', 'Jokes\JokesBapakController@getSave');
            $router->delete(
                '/{jokesBapakId}/delete',
                'Jokes\JokesBapakController@getDelete'
            );
        });
    });
});
