<?php
include_once '../model/Users.php';

if (isset($_POST['user_id'])){
  $id = $_POST['user_id'];
  $sanitizedID = filter_var( $id, FILTER_SANITIZE_NUMBER_INT);
  
  if ($sanitizedID == $id && filter_var($id, FILTER_VALIDATE_INT)){
    $users = new Users;
    $data = $users->findUser($id);
    echo $data['full_name'];
  }
}