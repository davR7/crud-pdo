$(document).ready(function () {
  $('body').on('click', '.trash-icon', function () {
    //Inserir id no input do modal
    var input = document.querySelector('.modal-footer #input-modal');
    var id = $(this).attr('data-id');
    input.value = id;

    //Inserir nome do usuario no modal
    const path = 'actions/userModal.php'
    $.post(path, { user_id: id }, function(res){
      $("#user-name").html(res);
    });
  });
});

//fonte: https://stackoverflow.com/questions/27279241/pass-id-value-from-ahref-to-bootstrap-modal-php
