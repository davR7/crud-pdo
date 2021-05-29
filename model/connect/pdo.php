<?php

class Connection extends PDO {
  public function __construct($file){
    if (!$config = parse_ini_file($file, true))
      throw new Exception("file does not open" . $file);

    $db = $config['database'];
    
    $dns = $db['driver'] . 
     ':host=' . $db['host'] . 
     ';dbname=' . $db['schema'];

    $username = $db['user'];
    $password = $db['pass'];
    
    $options = [
      PDO::ATTR_EMULATE_PREPARES   => false,
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
      parent::__construct($dns, $username, $password, $options);
    } catch (PDOException $e) {
      echo "Database error: ". $e->getMessage();
    } catch (Exception $e) {
      echo "Database error: ". $e->getMessage();
    }
  }
}