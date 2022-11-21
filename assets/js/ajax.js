$(document).ready(function () {
    listar();
});

$("#form").submit(function () {
  event.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: pag + "/inserir.php",
    type: "POST",
    data: formData,
    success: function (mensagem) {
      $("#mensagem").removeClass();
      if (mensagem.trim() == "Salvo com Sucesso!") {
        $("#btn-fechar").click();
        listar();
      } else {
      }
      $("#mensagem").text(mensagem);
    },

    cache: false,
    contentType: false,
    processData: false,
  });
});

function listar() {
    $.ajax({
      url: pag + "/listar.php",
      method: "POST",
      data: $("#form").serialize(),
      dataType: "html",
  
      success: function (result) {
        $("#listar").html(result);
      },
    });
  }
  