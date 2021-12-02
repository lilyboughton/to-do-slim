<?php

namespace App\ViewHelpers;

class TodosViewHelper
{
    public static function seeAllTodos(array $todos) : string
    {
        $displayString = '';
        foreach ($todos as $todo) {
            $displayString .= '<tr><td><p>'
                            . $todo['to-do']
                            . '</p></td><td><a class="edit" href="/mark-complete/' . $todo['id'] . '">Complete</a></td>'
                            . '<td><a class="edit" href="/edit-todo/' . $todo['id'] . '">Edit</a></td>'
                            . '</tr>';
        }

        return $displayString;
    }
}