<?php

$error = $_SERVER['REDIRECT_STATUS'];

$errCode = "";
$errMessage = "";

if ($error == "404"){
  $errCode = "404";
  $errMessage = "PAGINA NÃO ENCONTRADA";
} else if ($error == "500"){
  $errCode = "500";
  $errMessage = "ERRO INTERNO DO SERVIDOR";
} else {
  $errCode = "0";
  $errMessage = "ERRO DESCONHECIDO";
}
?>

<?php
//Page Header
include_once 'templates/CrudHeader.php';
?>

<div class="error-page">
  <div class="error_page__code mb-2"><?php echo $errCode ?></div>
  <div class="error_page__message mb-4"><?php echo $errMessage ?></div>
  <a class="error_page__btn" href='index.php'>Volte ao Home</a>
</div>

<?php
//Page Footer 
include_once 'templates/CrudFooter.php';
?>