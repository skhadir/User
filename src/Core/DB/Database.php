<?php

namespace Core\DB;
use \PDO;

class Database
{

    const DB_HOST = 'localhost';
    const DB_NAME = 'user';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    function getPDOConnection()
    {
        $pdo = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $pdo->exec('SET NAMES UTF8');

        return $pdo;
    }

    function executeQuery($sql, array $params = [])
    {
        $pdo = $this->getPDOConnection();
        $query = $pdo->prepare($sql);
        $query->execute($params);
        return $query;
    }

    function queryAll($sql, array $params = [])
    {
        $query = $this->executeQuery($sql, $params);
        return $query->fetchAll();
    }

    function queryOne($sql, array $params = [])
    {
        $query = $this->executeQuery($sql, $params);
        return $query->fetch();
    }

    function queryAction($sql, array $params = [])
    {
        $this->executeQuery($sql, $params);
    }
}