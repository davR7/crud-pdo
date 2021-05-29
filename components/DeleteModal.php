<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Usuário</h4>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir <strong id="user-name"></strong>?</p>
                <p class="text-danger">Essa ação não pode ser desfeita.</p>
            </div>
            <form action="actions/delUser.php" method="POST" class="modal-footer">
                <input type="hidden" name="user-id" id="input-modal" value="">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" name="del-btn" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>