<?php

namespace App\Factories;

use App\Controllers\MarkTodoCompleteController;
use Psr\Container\ContainerInterface;

class MarkTodoCompleteControllerFactory
{

    public function __invoke(ContainerInterface $container): MarkTodoCompleteController
    {
        $todoModel = $container->get('ToDoModel');
        return new MarkTodoCompleteController($todoModel);
    }
}


