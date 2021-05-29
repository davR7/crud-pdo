<?php
include_once '../model/Users.php';

if (isset($_POST['del-btn'])) {
  $idUser = $_POST['user-id'];
  echo $idUser;
  $users = new Users;
  $users->deleteUser($idUser);
  header("Location: ../index.php");
}