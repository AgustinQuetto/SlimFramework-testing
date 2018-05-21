<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->get('/name/{name}/[{message}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;
});

$app->post('[/]', function (Request $request, Response $response) {   
    $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->any('/all/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("{$request->getMethod()} => Bienvenido!!! a SlimFramework");
    return $response;
});

$app->group('/all/', function () use ($app) {
    $app->get('saludar/',  function (Request $request, Response $response) {
        $response->getBody()->write("HOLA AMIGOOOOO");
        return $response;
    });

    $app->post('saludar/',  function (Request $request, Response $response) {
        $response->getBody()->write("HOLA AMIGOOOOO POR POST");
        return $response;
    });

    $app->delete('saludar/',  function (Request $request, Response $response) {
        $response->getBody()->write("HOLA AMIGOOOOO POR DELETE");
        return $response;
    });
});