<?php

namespace App\Factories;

use App\Controllers\EditTodoController;
use Psr\Container\ContainerInterface;

class EditTodoControllerFactory
{

    public function __invoke(ContainerInterface $container): EditTodoController
    {
        $renderer = $container->get('renderer');
        $todoModel = $container->get('ToDoModel');
        return new EditTodoController($renderer, $todoModel);
    }
}


