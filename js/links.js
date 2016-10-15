$(document).ready(function() {

  $('#js-pisar').load('templates/home.tpl');
    

  $("#js-home").click(function() {
    $('#js-pisar').load('templates/home.tpl');
  });

  $("#js-horariosporsala").click(function() {
    $('#js-pisar').load('templates/horariosporsala.tpl');
  });

  $("#js-contacto").click(function() {
    $('#js-pisar').load('templates/contacto.tpl');
  });

  $("#js-peliculasdisponibles").click(function() {
    $('#js-pisar').load('templates/peliculasdisponibles.tpl');
  });

  });
