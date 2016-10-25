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
  $('#js-adminpeliculas').on("click",function(ev){
    Cargar('mostrar_admin_peliculas');
    ev.preventDefault();
  });
  $('#js-admingeneros').on("click",function(ev){
    Cargar('mostrar_admin_generos');
    ev.preventDefault();
  });
  $('#js-adminhorarios').on("click",function(ev){
    Cargar('mostrar_admin_horarios');
    ev.preventDefault();
  });
  $('#js-admincontacto').on("click",function(ev){
    Cargar('mostrar_admin_contacto');
    ev.preventDefault();
  });
  $('#js-peliculasdisponibles').on("click",function(ev){
    Cargar('mostrar_peliculas_disponibles');
    ev.preventDefault();
  });

  $('#js-peliculasgenero').on("click",function(ev){
    Cargar('mostrar_peliculas_genero');
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

$(document).on('submit','#editorGenero',function () {
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


});
