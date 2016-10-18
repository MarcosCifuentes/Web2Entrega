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

  $(document).on('click','#js-enviarMensaje',function () {
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


});
