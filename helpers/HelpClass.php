<?php

class HelpClass {
  public static function cleanInput($field){
    $field = trim($field);
    $field = strip_tags($field);
    return $field;
  }
  public static function formatString($mask, $str, $ch = '#'){
    $c = 0;
    $rs = '';
    for ($i = 0; $i < strlen($mask); $i++) {
        if ($mask[$i] == $ch) {
          $rs .= $str[$c];
          $c++;
        } else {
          $rs .= $mask[$i];
        }
    }
    return $rs;
  }
}