<?php

class TaskModel
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function updateTaskById($id)
    {
        $query = $this->db->prepare('UPDATE toDo SET done=1 WHERE id=:id ');
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function getAllTasks()
    {
        $sql = 'SELECT task, id, done FROM toDo;';
        $query = $this->db->query($sql, PDO::FETCH_ASSOC);
        $tasks = $query->fetchAll();
        return $tasks;
    }

    public function createTask($task)
    {
        $query = $this->db->prepare(' INSERT INTO toDo (task) VALUES (:task);');
        $query->bindParam(':task', $task);
        $query->execute();
    }
}