<?php

namespace App\Factories;

use App\Controllers\GetCompletedTodosController;
use Psr\Container\ContainerInterface;

class GetCompletedTodosControllerFactory
{

    public function __invoke(ContainerInterface $container): GetCompletedTodosController
    {
        $renderer = $container->get('renderer');
        $todoModel = $container->get('ToDoModel');
        return new GetCompletedTodosController($renderer, $todoModel);
    }
}

