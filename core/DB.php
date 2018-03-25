<?php

namespace Core;


class DB
{

    private static $self = null;

    private function __construct()
    {
    }

    public static function getInstance() : self
    {
        if (is_null(static::$self)) {
            static::$self = new static();
        }

        return static::$self;
    }

    public function getConnection() : \PDO
    {
        $dbConfig = require __DIR__ . '/../app/config/database.php';

        return new \PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['name']};charset=utf8", $dbConfig['user'], $dbConfig['password']);
    }

}