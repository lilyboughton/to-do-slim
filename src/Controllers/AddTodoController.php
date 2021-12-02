<?php

namespace App\Controllers;

use App\Models\TodoModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AddTodoController {

    private TodoModel $todoModel;

    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $postData = $request->getParsedBody();
        if(isset($postData['textInput'])){
            $this->todoModel->addTodo($postData['textInput']);
        }
        return $response->withHeader('Location', '/');
    }
}