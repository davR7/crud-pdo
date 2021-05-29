<?php

class ErrHandler {
  public function __construct($err, $codeErr){
    try {
      if ($err) throw new Exception($err, $codeErr);
    } catch (Exception $e){
      echo "Error: ".$e->getMessage() ." [".$e->getCode()."]";
    }
  }
}