<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->group('/api', function () use ($app, $log) {
    // Version group
    $app->group('/v1', function () use ($app, $log) {
        $app->get('/games/{gameId}/contests', function (Request $request, Response $response, array $args) {
            $gameId = $request->getAttribute('gameId');
            $this->logger->info("Slim-Skeleton '/' users");
            $response->getBody()->write(json_encode($this->GameAction->getContestsByGame($gameId)));
            return $response;
        });

        //add a new game
        $app->post('/games', function (Request $request, Response $response, array $args) {
            // Sample log message
            $postParas =  $request->getParsedBody();
            $game = new GameModel();
            foreach ($postParas as $key=>$value){
                $game->$key = $value;
            }
            $result = $this->GameAction->newGame($game);
            $resObj = new stdClass();
            $resObj->message = $result;
            $response->getBody()->write(json_encode($resObj));
            return $response;
        });

        //add a player to  a new game
        $app->post('/games/{gameId}/user/{userId}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");

            // Render index view
            return $this->renderer->render($response, 'index.phtml', $args);
        });

        //update game status: open, playing, close

        $app->put('/games/{id}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");

            // Render index view
            return $this->renderer->render($response, 'index.phtml', $args);
        });


        $app->put('/games/{gameId}/contests/{contestId}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");

            // Render index view
            return $this->renderer->render($response, 'index.phtml', $args);
        });


        $app->delete('/games/{id}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");

            // Render index view
            return $this->renderer->render($response, 'index.phtml', $args);
        });
    });
});
