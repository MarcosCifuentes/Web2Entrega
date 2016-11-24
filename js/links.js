$(document).ready(function() {

  function Cargar(accion) {
    var data = {
      action : accion
    };
    $.ajax({
      method: "POST",
      url: "index.php",
      data: data,
      success: function(dataDevuelta){
        $('#js-pisar').html(dataDevuelta);
      },
      error: function() {
        alert('Error');
      }
    })
  }

  Cargar('mostrar_home');

  pararTemporizador();

  var temporizador;

  function pararTemporizador() {
    clearInterval(temporizador);
  }



  $('.navegacion').on("click",function(ev){
    Cargar($(this).attr('name'));
    pararTemporizador();
    ev.preventDefault();
  });


  // darle los valores a los elementos del formulario

  $(document).on('submit','#peliculas_genero',function () {
    event.preventDefault();
    var genero = $('#dropdownGenero option:selected').val();
    formData = new FormData(this);
    formData.append('genero',genero);
    $.ajax({
      method: "POST",
      url: "index.php?action=listar_peliculas_genero",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        $(".filtroPelicula").html(data);
      }
    });
  });

  $(document).on('submit','.formulario',function () {
    event.preventDefault();
    formData = new FormData(this);
    var dir = $(this).attr("action");
    $.ajax({
      method: "POST",
      url: "index.php?action="+dir,
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        $("#js-pisar").html(data);
      }
    });
  });

  $(document).on("click",'.consulta_js', function(event){
    event.preventDefault();
    var dir = $(this).attr("name");
    $.get( "index.php?action="+dir,{datos: $(this).attr("data")}, function(data) {
      $('#js-pisar').html(data);
    });
  });

  $(document).on("click",'.logout', function(event){
    event.preventDefault();
    var dir = $(this).attr("name");
    $.get( "index.php?action="+dir,{datos: $(this).attr("data")}, function(data) {
      $('#js-pisar').html(data);
    });
  });

  $(document).on("click",'.peliculaElegida', function(){
    event.preventDefault();
    var dir = $(this).attr("name");
    var id = $(this).attr('data');
    $.get( "index.php?action="+dir,{datos: $(this).attr("data")}, function(data) {
      $('#js-pisar').html(data);
      temporizador = setInterval(function() {comentariosAjax(id)}, 2000);
      comentariosAjax(id);
    });
  });

  $(document).submit(".crearComentario",function(ev){//creacion de comentarios con api
    ev.preventDefault();
    $.ajax({
      url : 'api/comentario',
      data : {comentario:$(".coment-api").val(),puntuacion:$(".puntuacion-api").val(),id_pelicula:$(".id_pelicula-api").val()},
      type : 'POST',
      dataType : 'json',
      success : function() {
        $(".coment-api").val("");
      }
    });

  });

  $(document).on("click",".eliminarComentario",function() {//eliminacion de comentarios con api
    var id_pelicula = $(this).attr("id_pelicula");
    var dir = $(this).attr("id_comentario");
    $.ajax({
      url: 'api/comentario/'+dir,
      type: 'DELETE',
      success: function(result) {
        comentariosAjax(id_pelicula);
      }
    });
  });

  function createComentarios(comentarios){
    $.ajax({ url: 'js/templates/comentarios.mst',
    success: function(templateReceived) {
      var rendered = Mustache.render(templateReceived,{pelicula:comentarios});
      $("#div-com").html(rendered);
    }
  });

}

//cargado de comentarios de la api
function comentariosAjax(id_pelicula) {
  $.ajax(
    {
      method:"GET",
      dataType: "JSON",
      url: "api/comentario/" +id_pelicula,
      success:function(data) {
        createComentarios(data);
      }
    }

  )
}


});
