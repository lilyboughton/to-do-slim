<?php

namespace App\Controllers;

use App\Models\TodoModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DeleteTodoController {

    private TodoModel $todoModel;

    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $this->todoModel->deleteToDo($args['id']);
        return $response->withHeader('Location', '/completed-todos');
    }
}