<?php
namespace controller;

use PDO;
use PDOException;

class Connection
{
  private $host = 'localhost';
  private $db = 'test';
  private $user = 'root';
  private $pass = '';
  private $charset = 'utf8mb4';
  private $pdo;

  public function __construct()
  {
    $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
      $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
    } catch (PDOException $e) {
      throw new PDOException($e->getMessage(), (int) $e->getCode());
    }
  }

  public function prepare($sql)
  {
    return $this->pdo->prepare($sql);
  }

  public function execute($stmt)
  {
    return $stmt->execute();
  }
}
