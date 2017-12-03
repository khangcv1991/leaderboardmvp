<?php
// DIC configuration

spl_autoload_register('myAutoload');
function myAutoload($classname)
{


    if (preg_match('/[a-zA-Z]+Action$/', $classname)) {
        include __DIR__ . '/controller/' . $classname . '.php';
        return true;
    }elseif (preg_match('/[a-zA-Z]+Model$/', $classname)) {
        include __DIR__ . '/model/' . $classname . '.php';
        return true;
    }
}

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

//DB connection
$container['db'] = function ($c) {

    $settings = $c->get('settings')['db'];

    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'],
        $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

//Load classes
$container['UserAction'] = function ($c) {
    return new UserAction($c->db);
};

$container['GameAction'] = function ($c) {
    return new GameAction($c->db);
};