<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Routes
$app->group('/api', function () use ($app, $log) {

    // Version group
    $app->group('/v1', function () use ($app, $log) {


        $app->get('/users', function (Request $request, Response $response, array $args) {
            // Sample log message

            $this->logger->info("Slim-Skeleton '/' users");
            $response->getBody()->write(json_encode($this->UserAction->getAllUsers()));
            return $response;
        });

        $app->get('/users/{id}', function (Request $request, Response $response, array $args) {
            // Sample log message

            $this->logger->info("Slim-Skeleton '/' users");
            $id = $request->getAttribute('id');
            $response->getBody()->write(json_encode($this->UserAction->getUserById($id)));
            return $response;
        });

        $app->post('/users', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");
            $postParas =  $request->getParsedBody();
            $user = new UserModel();
            foreach ($postParas as $key=>$value){
                $user->$key = $value;
            }
            $result = $this->UserAction->addUser($user);

            $resObj = new stdClass();
            $resObj->message = $result;
            $response->getBody()->write(json_encode($resObj));
            return $response;
        });

        $app->put('/users/{id}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");
            $id = $request->getAttribute('id');
            // Render index view
            $postParas =  $request->getParsedBody();
            $user = new UserModel();
            foreach ($postParas as $key=>$value){
                $user->$key = $value;
            }
            $result = $this->UserAction->updateUser($user);

            $resObj = new stdClass();
            $resObj->message = $result;
            $response->getBody()->write(json_encode($resObj));
            return $response;
        });

        $app->delete('/users/{id}', function (Request $request, Response $response, array $args) {
            // Sample log message
            $this->logger->info("Slim-Skeleton '/' route");
            $id = $request->getAttribute('id');

            $result = $this->UserAction->deleteUserById($id);
            $resObj = new stdClass();
            $resObj->message = $result;
            $response->getBody()->write(json_encode($resObj));
            return $response;

        });
    });
});




