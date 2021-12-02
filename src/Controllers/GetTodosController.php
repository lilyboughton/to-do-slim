<?php

namespace App\Controllers;

use App\Models\TodoModel;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GetTodosController {

    private PhpRenderer $renderer;
    private TodoModel $todoModel;

    public function __construct(PhpRenderer $renderer, TodoModel $todoModel)
    {
        $this->renderer = $renderer;
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $getData = $request->getQueryParams();

        if(isset($getData['searchString'])){
            $args['todos'] = $this->todoModel->searchTodos($getData['searchString'], 0);
        } else {
            $args['todos'] = $this->todoModel->getToDos();
        }

        return $this->renderer->render($response, "todos.phtml", $args);
    }
}