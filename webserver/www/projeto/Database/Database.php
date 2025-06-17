<?php

namespace Models;

use \PDO;
use \PDOException;

class Database {

  const HOST = 'mysql';
  const NAME = 'projeto';
  const USER = 'aluno';
  const PASS = '123456';
  const PORT = '3306';

  private $table;
  private $connection;

  public function __construct($table = null) {
    $this->table = $table;
    $this->setConnection();
  }

  private function setConnection() {
    try {
      $this->connection = new PDO(
        'mysql:host=' . self::HOST . 
        ';port=' . self::PORT . 
        ';dbname=' . self::NAME . 
        ';charset=utf8',
        self::USER,
        self::PASS
      );
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die('ERROR: ' . $e->getMessage());
    }
  }

  public function execute($query, $params = []) {
    try {
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    } catch (PDOException $e) {
      die('ERROR: ' . $e->getMessage());
    }
  }

  public function insert($values) {
    $fields = array_keys($values);
    $binds  = array_pad([], count($fields), '?');
    $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
    $this->execute($query, array_values($values));
    return $this->connection->lastInsertId();
  }

  public function select($join = null, $where = null, $order = null, $limit = null, $fields = '*') {
    @$join = strlen($join) ? 'INNER JOIN ' . $join : '';
    @$where = strlen($where) ? 'WHERE ' . $where : '';
    @$order = strlen($order) ? 'ORDER BY ' . $order : '';
    @$limit = strlen($limit) ? 'LIMIT ' . $limit : '';
    $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $join . ' ' . $where . ' ' . $order . ' ' . $limit;
    return $this->execute($query);
  }

  public function update($where, $values) {
    $fields = array_keys($values);
    $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
    $this->execute($query, array_values($values));
    return true;
  }

  public function delete($where) {
    $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
    $this->execute($query);
    return true;
  }

  // ✅ Método adicionado para acessar diretamente o PDO
  public function pdo() {
    return $this->connection;
  }
}
