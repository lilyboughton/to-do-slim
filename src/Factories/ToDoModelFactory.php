<?php

namespace App\Factories;

use App\Models\ToDoModel;
use Psr\Container\ContainerInterface;

class ToDoModelFactory {

    public function __invoke(ContainerInterface $container) : ToDoModel
    {
        $db = $container->get('db');
        return new ToDoModel($db);
    }
}

