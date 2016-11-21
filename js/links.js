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

  $('#js-home').on("click",function(ev){
    Cargar('mostrar_home');
    ev.preventDefault();
  });
  $('#js-peliculasdisponibles').on("click",function(ev){
    Cargar('mostrar_peliculas_disponibles');
    ev.preventDefault();
  });

  $('#js-peliculasgenero').on("click",function(ev){
    Cargar('mostrar_genero');
    ev.preventDefault();
  });

  $('#js-horariosporsala').on("click",function(ev){
    Cargar('mostrar_horarios_por_sala');
    ev.preventDefault();
  });

  $('#js-contacto').on("click",function(ev){
    Cargar('mostrar_contacto');
    ev.preventDefault();
  });

  $('#js-login').on("click",function(ev){
    Cargar('mostrar_login');
    ev.preventDefault();
  });

  $('#js-logout').on("click",function(ev){
    Cargar('logout');
    ev.preventDefault();
  });

  $('#js-registrar').on("click",function(ev){
    Cargar('mostrar_register');
    ev.preventDefault();
  });



  // darle los valores a los elementos del formulario

  $(document).on('submit',"#formPelicula",function () {
    event.preventDefault();
    formData = new FormData(this);
    $.ajax({
      method: "POST",
      url: "index.php?action=agregar_pelicula",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        $("#js-pisar").html(data);
      }
    });
  });

  $(document).on('submit',"#formHorario",function () {
    event.preventDefault();
    var titulo = $('#dropdownPelicula option:selected').val();
    formData = new FormData(this);
    formData.append('titulo',titulo);
    $.ajax({
      method: "POST",
      url: "index.php?action=agregar_horario",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        $("#js-pisar").html(data);
      }
    });
  });

  $(document).on('submit',"#formContacto",function () {
    event.preventDefault();
    formData = new FormData(this);
    $.ajax({
      method: "POST",
      url: "index.php?action=enviar_mensaje",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        $("#js-pisar").html(data);
      }
    });
  });

  $(document).on('submit',"#formGenero",function () {
    event.preventDefault();
    formData = new FormData(this);
    $.ajax({
      method: "POST",
      url: "index.php?action=agregar_genero",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        $("#js-pisar").html(data);
      }
    });
  });

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


  $(document).on('submit','#eliminar_peliculas_genero',function () {
    event.preventDefault();
    var genero = $('#dropdownEliminarGenero option:selected').val();
    formData = new FormData(this);
    formData.append('genero',genero);
    $.ajax({
      method: "POST",
      url: "index.php?action=eliminar_genero",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        $("#js-pisar").html(data);
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

  $(document).on("click",'#editorPelicula', function(){
    event.preventDefault();
    $.get( "index.php?action=editor_pelicula",{ id_pelicula: $(this).attr("data-idpelicula")}, function(data) {
      $('#js-pisar').html(data);
    });
  });

  $(document).on("click",'#editorHorario', function(){
    event.preventDefault();
    $.get( "index.php?action=editor_horario",{id_horario: $(this).attr("data-idhorario")}, function(data) {
      $('#js-pisar').html(data);
    });
  });

  $(document).on("click",'#editorUsuario', function(){
    event.preventDefault();
    $.get( "index.php?action=editor_usuario",{email: $(this).attr("data-email")}, function(data) {
      $('#js-pisar').html(data);
    });
  });

  $(document).on("click",'#eliminarPelicula', function(){
    event.preventDefault();
    $.get( "index.php?action=eliminar_pelicula",{ id_pelicula: $(this).attr("data-idpelicula")}, function(data) {
      $('#js-pisar').html(data);
    });
  });

  $(document).on("click",'#eliminarHorario', function(){
    event.preventDefault();
    $.get( "index.php?action=eliminar_horario",{ id_horario: $(this).attr("data-idhorario") }, function(data) {
      $('#js-pisar').html(data);
    });

  });

  $(document).on("click",'#eliminarMensaje', function(){
    event.preventDefault();
    $.get( "index.php?action=eliminar_mensaje",{ id_contacto: $(this).attr("data-idcontacto") }, function(data) {
      $('#js-pisar').html(data);
    });
  });

  $(document).on("submit",".crearComentario",function(e){//creacion de comentarios con api
    e.preventDefault();
    $.ajax({
      url : 'api/comentarios',
      data : {comentario:$(".text-api").val(),puntaje:$(".puntaje-api").val(),id_pelicula:$(".id_pelicula-api").val()},
      type : 'POST',
      dataType : 'json',
      success : function() {
        setTimeout(function(){comentariosAjax($('.id_pelicula-api').val());},2000);
        //comentariosAjax($(".id_cabania-api").val());

      }
    });

  });

  $(document).on("click",".eliminarComentario",function() {//eliminacion de comentarios con api
    var id_pelicula = $(this).attr("id_pelicula");
    var dir = $(this).attr("id_comentario");
    $.ajax({
      url: 'api/comentarios/'+dir,
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
function comentariosAjax(id_cabania) {
  $.ajax(
    {
      method:"GET",
      dataType: "JSON",
      url: "api/ComentariosApi/" +id_pelicula,//traer id de la cabania que pertenece
      success:function(data) {
        createComentarios(data);
      }
    }

  )
}


});
