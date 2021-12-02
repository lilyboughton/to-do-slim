<?php

namespace App\Models;
use PDO;

class ToDoModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getToDos()
    {
        $query = $this->db->prepare("SELECT `id`,`to-do` FROM `to-dos` WHERE `completed` = 0 AND `deleted` = 0;");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $query->fetchAll();
    }

    public function getCompletedToDos()
    {
        $query = $this->db->prepare("SELECT `id`,`to-do` FROM `to-dos` WHERE `completed` = 1 AND `deleted` = 0;");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $query->fetchAll();
    }

    public function  addTodo(string $todoString)
    {
        $query = $this->db->prepare("INSERT INTO `to-dos` (`to-do`) VALUES (:todo);");
        $query->bindParam(':todo', $todoString);
        $query->execute();
    }

    public function searchTodos(string $searchString , int $completed)
    {
        $query = $this->db->prepare("SELECT `id`,`to-do` FROM `to-dos` WHERE  `completed` = :completed and `deleted` = 0 AND `to-do` LIKE '%' :todo '%';");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->bindParam(':todo', $searchString);
        $query->bindParam(':completed', $completed);
        $query->execute();
        return $query->fetchAll();
    }

    public function markToDoComplete(string $id)
    {
        $query = $this->db->prepare("UPDATE `to-dos` SET `completed` = 1 WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function deleteToDo(string $id)
    {
        $query = $this->db->prepare("UPDATE `to-dos` SET `deleted` = 1 WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function updateToDo(string $id, string $todo)
    {
        $query = $this->db->prepare("UPDATE `to-dos` SET `to-do` = :todo WHERE `id` = :id");
        $query->bindParam(':id', $id);
        $query->bindParam(':todo', $todo);
        $query->execute();
    }

    public function getTodoToEdit(string $id)
    {
        $query = $this->db->prepare("SELECT `id`,`to-do` FROM `to-dos` WHERE `id` = :id;");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }
}