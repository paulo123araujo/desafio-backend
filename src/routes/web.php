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
    return $router->app->version();
});

$router->group([
    "prefix" => "users"
], function () use ($router) {
    $router->get("/", "UserIlluminateAdapter@listAllUsers");
    $router->get("/movements", "UserIlluminateAdapter@listUsersAndMovements");
    $router->get("/{userId}", "UserIlluminateAdapter@getUserById");
    $router->get("/{userId}/balance", "UserIlluminateAdapter@getUserBalance");
    $router->post("/", "UserIlluminateAdapter@registerUser");
    $router->delete("/{userId}", "UserIlluminateAdapter@removeUser");

    $router->put("/{userId}/openingBalance", "UserIlluminateAdapter@updateUserOpeningBalance");

    $router->post("/{userId}/movements", "MovementIlluminateAdapter@registerMovement");
    $router->delete("/{userId}/movements/{movementId}", "MovementIlluminateAdapter@removeMovement");
});

$router->get("/movements", "MovementIlluminateAdapter@listMovements");
