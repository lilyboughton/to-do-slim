<?php

namespace App\Controllers;

use App\Models\TodoModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EditTodoController {

    private PhpRenderer $renderer;
    private TodoModel $todoModel;

    public function __construct(PhpRenderer $renderer, TodoModel $todoModel)
    {
        $this->renderer = $renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['todo'] = $this->todoModel->getTodoToEdit($args['id']);
        return $this->renderer->render($response, "editTodo.phtml", $args);
    }
}