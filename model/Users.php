<?php
include_once 'connect/pdo.php';
include_once 'error/ErrHandler.php';

class Users {
  protected $pdo;

  public function __construct() {
    $this->pdo = new Connection('development.ini');
  }
  
  public function createUser($name, $email, $phone){
    $query1 = "SELECT id from users WHERE email = ?";

    $res = $this->pdo->prepare($query1);
    $res->execute([$email]);

    if ($res->rowCount() > 0){
      new ErrHandler("Usuario já cadastrado", 400);
      return false;
    }
    
    $query2 = "INSERT INTO users (full_name, email, phone)
      VALUES (?, ?, ?)";
    
    $res = $this->pdo->prepare($query2);
    $res->execute([$name, $email, $phone]);
    $res = null;
    return true;
  }  
  
  public function findUsers($page, $limit){
    $offset = ($page * $limit) - $limit;
    $query = 'SELECT * FROM users ORDER BY id ASC LIMIT ?, ?';

    try {
      $res = $this->pdo->prepare($query);
      $res->execute([$offset, $limit]);
      $users = $res->fetchAll();
      return $users;
    } catch(Exception $e) {
      echo "Error: ".$e->getMessage();
    }
  }

  public function countUsers(){
    $query = "SELECT COUNT(*) FROM users";

    try {
      $res = $this->pdo->query($query);
      $count = $res->fetchColumn(); 
      return $count;
    } catch(Exception $e) {
      echo "Error: ".$e->getMessage();
    }
  }
  
  public function findUser($id){
    $query = 'SELECT * FROM users WHERE id = ?';

    try {
      $res = $this->pdo->prepare($query);
      $res->execute([$id]);
      $user = $res->fetch();
      return $user;
    } catch(Exception $e) {
      echo "Error: ".$e->getMessage();
    }
  }

  public function updateUser($id, $full_name, $email, $phone){
    $query = "UPDATE users SET full_name = ?, email = ?, 
      phone = ? WHERE id = ?";

    try {
      $res = $this->pdo->prepare($query);
      $res->execute([$full_name, $email, $phone, $id]);
      $res = null;
    } catch (Exception $e) {
      echo "Error: ".$e->getMessage();
    }
  }

  public function deleteUser($id){
    $query = "DELETE FROM users WHERE id = ?";

    try {
      $res = $this->pdo->prepare($query);
      $res->execute([$id]);
      $res = null;
    } catch (Exception $e) {
      echo "Error: ".$e->getMessage();
    }
  }
}