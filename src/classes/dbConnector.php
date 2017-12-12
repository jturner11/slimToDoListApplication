<?php

class dbConnector
{
    public $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=192.168.20.20;dbname=todoList', 'root', '');
    }
}
