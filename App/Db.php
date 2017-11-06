<?php

namespace App;

use App;

class Db
{
    public $pdo;

    public function __construct()
    {
        $settings = $this->getPDOSettings();
        $this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], null);
    }

    protected function getPDOSettings()
    {
        $config = include ROOTPATH.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Db.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }

    public function execute($query, array $params=null)
    {
        if(is_null($params)){
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll();
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function update($params)
    {
        $sql = "UPDATE blogs SET header = :header,
            text = :text, updated_at = :updated_at
            WHERE id = :blog_id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':header', $params['header']);
        $stmt->bindParam(':text', $params['text']);
        $stmt->bindParam(':blog_id', $params['blog_id']);
        $stmt->bindParam(':updated_at', date("Y-m-d H:i:s"));
        $stmt->execute();
    }

    public function insert($params)
    {
        $sql = "INSERT INTO blogs(blog_id, header,
            text, created_at) VALUES (:blog_id,
            :header, 
            :text, :created_at)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':blog_id', $params['blog_id']);
        $stmt->bindParam(':header', $params['header']);
        $stmt->bindParam(':text', $params['text']);
        $stmt->bindParam(':created_at', date("Y-m-d H:i:s"));
        $stmt->execute();
    }

    public function delete($params)
    {
        $sql = "DELETE FROM blogs WHERE blog_id = :blog_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':blog_id', $params['blog_id']);
        $stmt->execute();
    }
}