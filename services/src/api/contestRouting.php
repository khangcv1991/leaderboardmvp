<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->group('/api', function () use ($app, $log) {

    // Version group
    $app->group('/v1', function () use ($app, $log) {
        //query string: ?status=##&game=##
        $app->get('/contests', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");
            // Render index view
            return $this->renderer->render($response, 'index.phtml', $args);
        });


        //add a new game
        $app->post('/contests', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");

            // Render index view
            return $this->renderer->render($response, 'index.phtml', $args);
        });


        //update game status: open, playing, close

        $app->put('/contests/{id}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");

            // Render index view
            return $this->renderer->render($response, 'index.phtml', $args);
        });

        $app->delete('/contests/{id}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");

            // Render index view
            return $this->renderer->render($response, 'index.phtml', $args);
        });
    });
});
