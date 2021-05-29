<?php

include_once '../model/Users.php';
include_once '../helpers/HelpClass.php';

class ConfirmUser {
  public $users;

  public function __construct(){
    $this->users = new Users;
    $this->validateUser();
  }

  public function validateUser(){
    if (isset($_POST['add-btn']) || isset($_POST['edit-btn'])){

      $inputErr = array(
        "success" => false,
        "errorType" => "form",
        "errors" => array("fullname" => '', "email" => '', "phone" => '')
      );
      
      $emptyErrors = [
        "fullname" => "Campo Nome é requerido",
        "email" => "Campo Email é requerido.",
        "phone" => "Campo Telefone é requerido."
      ];

      foreach ($_POST as $key => $value){
        if (empty($_POST[$key])){
          $inputErr["errors"][$key] = $emptyErrors[$key];
        }
      }

      $fullname = HelpClass::cleanInput($_POST['fullname']);
      $email = HelpClass::cleanInput($_POST['email']);
      $phone = HelpClass::cleanInput($_POST['phone']);

      if (empty($inputErr["errors"]["fullname"])){
        if (!preg_match("/^[a-zA-Z\s]*$/", $fullname)){
          $inputErr["errors"]["fullname"] = "O nome é inválido.";
        }
      }
      
      if (empty($inputErr["errors"]["email"])){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $inputErr["errors"]["email"] = "O email é inválido.";
        }
      }
      
      if (empty($inputErr["errors"]["phone"])){
        if (!preg_match("/^\d{2}\d{5}\d{4}$/", $phone)) {
          $inputErr["errors"]["phone"] = "O telefone é inválido.";
        }
      }      

      if (!array_filter($inputErr["errors"])){
        if (array_key_exists('add-btn', $_POST)) {
          $status = $this->users->createUser($fullname, $email, $phone);
          if ($status) echo json_encode(["success"=> true, "action"=> "insert"]);
        } else if (array_key_exists('edit-btn', $_POST)) {
          $userId = $_POST['id'];
          $this->users->updateUser($userId, $fullname, $email, $phone);
          echo json_encode(["success"=> true, "action" => "update"]);
        }
      } else {
        echo json_encode($inputErr);
      }
    }
  }
}

new ConfirmUser();
