<?php

namespace App\Factories;

use App\Controllers\GetTodosController;
use Psr\Container\ContainerInterface;

class GetTodosControllerFactory
{

    public function __invoke(ContainerInterface $container): GetTodosController
    {
        $renderer = $container->get('renderer');
        $todoModel = $container->get('ToDoModel');
        return new GetTodosController($renderer, $todoModel);
    }
}

