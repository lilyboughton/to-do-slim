<?php


namespace App\ViewHelpers;

class CompletedTodosViewHelper
{
    public static function seeAllCompletedTodos(array $completedTodos): string
    {
        $displayString = '';
        foreach ($completedTodos as $completedTodo) {
            $displayString .= '<p>'
            . $completedTodo['to-do']
            . '<a href="/delete-todo/' . $completedTodo['id'] . '">Delete Todo</a>'
            . '</p>';
        }

        return $displayString;
    }
}