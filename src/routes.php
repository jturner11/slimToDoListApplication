<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    include "src/classes/model/model.php";
    include "src/classes/dbConnector.php";
    $dbConnector = new dbConnector();
    $TaskModel = new TaskModel($dbConnector->db);
    $allTasks = $TaskModel->getAllTasks();
    $data = ['allTasks' => $allTasks];
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $data);

});

$app->get('/addTask', function (Request $request, Response $response, array $args) {
    include "src/classes/model/model.php";
    include "src/classes/dbConnector.php";
    $dbConnector = new dbConnector();
    $TaskModel = new TaskModel($dbConnector->db);
    $TaskModel->createTask($_GET['sendTask']);
    return $response->withRedirect('/');
});

$app->get('/done', function (Request $request, Response $response, array $args) {
    include "src/classes/model/model.php";
    include "src/classes/dbConnector.php";
    $dbConnector = new dbConnector();
    $TaskModel = new TaskModel($dbConnector->db);
    $TaskModel->updateTaskById($_GET['id']);
    return $response->withRedirect('/');
});
