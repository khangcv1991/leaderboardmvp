<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->group('/api', function () use ($app, $log) {
    // Version group
    $app->group('/v1', function () use ($app, $log) {

        //get all subscribes
        $app->get('/subscribe', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");


        });

        //add subscribe
        $app->post('/subscribe/{contestId}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");


        });



        //remove subscribe
        $app->delete('/subscribe/{id}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");


        });
    });
});
