<?php
//User Model
include_once 'model/Users.php';
include_once 'helpers/HelpClass.php';

//Pagination
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$limit = (isset($_GET['limit'])) ? (int)$_GET['limit'] : 5;
$users = new Users();
$users = $users->findUsers($page, $limit);

//Count users
$totrows = new Users;
$totrows = $totrows->countUsers();
$totpages = ceil($totrows/$limit);
?>

<?php
//Header 
include_once 'templates/CrudHeader.php';
?>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>CRUD com PDO</h2>
                    </div>
                    <div class="col-sm-6">
                      <a href="adicionar.php" class="add-user btn btn-success"><i class="material-icons">&#xe145;</i><span>Adicionar</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome Completo</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($users): ?>
                      <?php foreach ($users as $user) : ?>
                          <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['full_name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo HelpClass::formatString('(##) #####-####', $user['phone']); ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $user['id']; ?>" class="pencil-icon"><i class="material-icons" title="Editar Usuário">&#xE254;</i></a>
                                <a href="#deleteModal" class="trash-icon" data-id="<?php echo $user['id']; ?>" role="button" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Deletar Usuário">&#xE872;</i></a>
                            </td>
                          </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <th>--</th>
                        <th>-------------------</th>
                        <th>-------</th>
                        <th>-----------</th>
                        <th>-------</th>
                      </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php 
            //Paginação
            include_once 'components/CrudPagination.php'; ?>
        </div>
    </div>
</div>
<?php 
//Modal
include_once 'components/DeleteModal.php'; ?>
<?php
//Footer 
include_once 'templates/CrudFooter.php';
?>