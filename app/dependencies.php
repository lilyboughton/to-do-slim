<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container[LoggerInterface::class] = function (ContainerInterface $c) {
        $settings = $c->get('settings');

        $loggerSettings = $settings['logger'];
        $logger = new Logger($loggerSettings['name']);

        $processor = new UidProcessor();
        $logger->pushProcessor($processor);

        $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
        $logger->pushHandler($handler);

        return $logger;
    };

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['db'] = new PDO('mysql:host=127.0.0.1;dbname=to-dos', 'root', 'password');
    $container['ToDoModel'] = DI\factory(\App\Factories\ToDoModelFactory::class);
    $container['GetTodosController'] = DI\factory(\App\Factories\GetTodosControllerFactory::class);
    $container['GetCompletedTodosController'] = DI\factory(\App\Factories\GetCompletedTodosControllerFactory::class);
    $container['AddTodoController'] = DI\factory(\App\Factories\AddTodoControllerFactory::class);
    $container['MarkTodoCompleteController'] = DI\factory(\App\Factories\MarkTodoCompleteControllerFactory::class);
    $container['DeleteTodoController'] = DI\factory(\App\Factories\DeleteTodoControllerFactory::class);
    $container['EditTodoController'] = DI\factory(\App\Factories\EditTodoControllerFactory::class);
    $container['UpdateTodoController'] = DI\factory(\App\Factories\UpdateTodoControllerFactory::class);

    $containerBuilder->addDefinitions($container);
};
