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
    <h2>Adicionar Usuário</h2>
    <div class="form-group">
		  <input type="text" class="form-control" name="fullname" placeholder="Nome">
      <div id="fullname-error" class="error-block text-danger"></div>   	
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="email" placeholder="Email">
      <div id="email-error" class="error-block text-danger"></div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="phone" placeholder="Telefone">
      <div id="phone-error" class="error-block text-danger"></div>
    </div>
    <div class="form-group">
		  <div class="row">
        <div class="col"><a href="index.php" class="btn btn-secondary btn-lg btn-block">Voltar</a></div>
		    <div class="col"><button type="submit" name="add-btn" value="submit" class="btn btn-success btn-lg btn-block">Adicionar</button></div>
		  </div>        	
    </div>
  </form>
</div>

<?php
//Page Footer 
include_once 'templates/CrudFooter.php';
?>