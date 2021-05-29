$(document).ready(function(){
  $(".crud-form").submit(function (event) {
    event.preventDefault();
    const btn = $("button[type=submit]");
    
    var formData = $(this).closest('form').serializeArray();
    formData.push({ name: btn.attr("name"), value: btn.val() });

    $.ajax({
      url: "actions/ConfirmUser.php",
      type: "post",
      data: formData,
      dataType: "json",
      encode: true,
      success: function (data) {
        if (!data.success) {
          $.each(data.errors, function(key, value){
            $(".crud-form")
              .find('div[id="'+key+'-error'+'"]')
              .html(value);
          });
        } else {
          $(".alert").addClass("alert-success");
          
          if (data.action == "insert"){
            $(".alert__title").html("Usuário salvo com sucesso!");
          } else if (data.action = "update") {
            $(".alert__title").html("Usuário atualizado com sucesso!");
          }

          $(".crud-form input").val("");
          $(".error-block").html("");
          $(".alert").show();
        }
      },
      error: function (err) {
        $("#top-display").addClass("alert-danger");
        $("#top-display").html(err.responseText);
        $(".error-block").html("");
        $("#top-display").show();
      }
    });
  });
});