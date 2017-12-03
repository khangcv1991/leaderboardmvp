<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->group('/api', function () use ($app, $log) {

    // Version group
    $app->group('/v1', function () use ($app, $log) {

        $app->post('/login', function (Request $request, Response $response, array $args) {
            $this->logger->info("Slim-Skeleton '/' route");
        });

        $app->post('/logout', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");


        });


    });
});