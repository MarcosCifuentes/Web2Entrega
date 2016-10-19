<h1>Sala y Horario</h1>
<table class="table">
  <thead>
    <tr>
      <th>Pelicula</th>
      <th>Sala</th>
      <th>Horario</th>
      <th>Configuracion</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$horarios key=index item=horario}
      <tr>
        <td>
          {$horario['pelicula']}
        </td>
        <td>
          {$horario['sala']}
        </td>
        <td>
          {$horario['horario']}
        </td>
        <td>
          <a class="js-visibilidad" id="eliminarPeliculaHorario" href="#" data-idhorario="{$pelicula['id_horario']}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
          <a class="js-visibilidad" id="editarPeliculaHorario" href="#" data-idhorario="{$pelicula['id_horario']}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        </td>
      </tr>
      {/foreach}
  </tbody>
</table>
<div class="js-visibilidad">
<h2>Agregar Horario</h2>
    <form id="formHorario" action="agregar_horario" method="post" enctype="multipart/form-data">
      <input type="text" name="pelicula"  required value="" placeholder="Pelicula">
      <input type="text" name="sala"  required value="" placeholder="Sala">
      <input type="text" name="horario"  required value="" placeholder="Horario">
      <input type="submit" name="Agregar" id="agregarHorario">
    </form>
</div>
