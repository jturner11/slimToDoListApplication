<?php
/**
 * Created by PhpStorm.
 * User: academy
 * Date: 23/11/2017
 * Time: 16:07
 */

class viewhelper
{
    public
    function displayToDo($task)
    {
        return "<td>" . $task['task'] . "</td>";
    }
    public function checkDoneStatus($done, $task)
    {
        return $task['done'] == $done;
    }
}