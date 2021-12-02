<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {

    $app->get('/', 'GetTodosController');
    $app->get('/completed-todos', 'GetCompletedTodosController');
    $app->post('/add-todo', 'AddTodoController');
    $app->get('/mark-complete/{id}', 'MarkTodoCompleteController');
    $app->get('/delete-todo/{id}', 'DeleteTodoController');
    $app->get('/edit-todo/{id}', 'EditTodoController');
    $app->post('/update-todo/{id}', 'UpdateTodoController');
};
