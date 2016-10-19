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
    formData = new FormData(this);
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

  $(document).on('submit','#peliculas_genero',function () {
  event.preventDefault();
  var genero = $('#dropdownGenero option:selected').val();
  formData = new FormData(this);
  formData.append('generos',genero);
  $.ajax({
    method: "POST",
    url: "index.php?action=listar_peliculas_genero",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
      $(".contenedorFiltro").html(data);
    }
  });
});

  $('#eliminarPelicula').click(function(){
  event.preventDefault();
  $.get( "index.php?action=eliminar_pelicula",{ id_pelicula: $(this).attr("data-idpelicula") }, function(data) {
    $('#js-pisar').html(data);
    });

  });

  $('#eliminarPeliculaHorario').click(function(){
  event.preventDefault();
  $.get( "index.php?action=eliminar_horario",{ id_horario: $(this).attr("data-idhorario") }, function(data) {
    $('#js-pisar').html(data);
    });

  });

  $('#eliminarMensaje').click(function(){
  event.preventDefault();
  $.get( "index.php?action=eliminar_mensaje",{ id_contacto: $(this).attr("data-idcontacto") }, function(data) {
    $('#js-pisar').html(data);
    });

  });


});
