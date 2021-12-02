<?php

namespace App\Controllers;

use App\Models\TodoModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UpdateTodoController {

    private TodoModel $todoModel;

    public function __construct(TodoModel $todoModel)
    {
        $this->todoModel = $todoModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $postData = $request->getParsedBody();
        if(isset($postData['todoString'])){
            $this->todoModel->updateToDo($args['id'], $postData['todoString']);
        }
        return $response->withHeader('Location', '/');
    }
}