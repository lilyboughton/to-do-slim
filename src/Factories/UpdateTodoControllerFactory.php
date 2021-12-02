<?php

namespace App\Factories;

use App\Controllers\UpdateTodoController;
use Psr\Container\ContainerInterface;

class UpdateTodoControllerFactory
{

    public function __invoke(ContainerInterface $container): UpdateTodoController
    {
        $todoModel = $container->get('ToDoModel');
        return new UpdateTodoController($todoModel);
    }
}
