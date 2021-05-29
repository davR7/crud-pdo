<?php
include_once 'model/Users.php';

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $sanitizedID = filter_var( $id, FILTER_SANITIZE_NUMBER_INT);

  if ($sanitizedID == $id && filter_var($id, FILTER_VALIDATE_INT)){
    $users = new Users;
    $data = $users->findUser($id);
  }
}
?>

<?php
//Page Header
include_once 'templates/CrudHeader.php';
?>

<?php
//Alert
include_once 'components/CrudAlert.php';
?>
<div class="form-box">
  <form action="actions/ConfirmUser.php" method="POST" class="crud-form">
	  <h2>Editar Usuário</h2>
    <input 
      type="hidden" 
      name="id" 
      value="<?php if (isset($_GET['id'])){ 
        echo $_GET['id']; } ;?>"
    >
    <div class="form-group">
		  <input 
        type="text" 
        class="form-control" 
        name="fullname" 
        placeholder="Nome"
        value="<?php if (isset($data['full_name'])){ 
          echo $data['full_name']; } ;?>"
      >
      <div id="fullname-error" class="error-block text-danger"></div>   	
    </div>
    <div class="form-group">
      <input 
        type="text" 
        class="form-control" 
        name="email" 
        placeholder="Email"
        value="<?php if (isset($data['email'])){ 
          echo $data['email']; } ;?>"
      >
      <div id="email-error" class="error-block text-danger"></div>
    </div>
    <div class="form-group">
      <input 
        type="text" 
        class="form-control" 
        name="phone" 
        placeholder="Telefone"
        value="<?php if (isset($data['phone'])){ 
          echo $data['phone']; };?>"
      >
      <div id="phone-error" class="error-block text-danger"></div>
    </div>
    <div class="form-group">
		  <div class="row">
        <div class="col"><a href="index.php" class="btn btn-secondary btn-lg btn-block">Voltar</a></div>
		    <div class="col"><button type="submit" name="edit-btn" value="submit" class="btn btn-info btn-lg btn-block">Editar</button></div>
		  </div>        	
    </div>
  </form>
</div>

<?php
//Page Footer 
include_once 'templates/CrudFooter.php';
?>