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
          <a class="js-visibilidad" id="eliminarHorario" href="#" data-idhorario="{$horario['id_horario']}"><span class="glyphicon glyphicon-remove" ></span></a>
          <a class="js-visibilidad" id="editarHorario" href="#" data-idhorario="{$horario['id_horario']}"><span class="glyphicon glyphicon-pencil" ></span></a>
        </td>
      </tr>
      {/foreach}
  </tbody>
</table>
<div class="js-visibilidad">
<h2>Agregar Horario</h2>
    <form id="formHorario" action="agregar_horario" method="post" enctype="multipart/form-data">
      <div class="">Pelicula:
      <select class="form-control" id="dropdownPelicula" name="genero">
        <option value="">Elegir Pelicula</option>
        {foreach from=$peliculas item=pelicula}
        <option value="{$pelicula['id_pelicula']}">{$pelicula['titulo']}</option>
        {/foreach}
        </select>
        </div>
      <input type="text" name="sala"  required value="" placeholder="Sala">
      <input type="text" name="horario"  required value="" placeholder="Horario">
      <input type="submit" name="Agregar" id="agregarHorario">
    </form>
</div>
<div class="editorHorario">
      <h2>Editar Pelicula</h2>
        <form id="formEditHorario" action="editar_horario" method="post" enctype="multipart/form-data">
		<input type="hidden" name="idhorario"  value="">
          <input type="text" name="pelicula"  required value="" placeholder="pelicula">
          <input type="text" name="sala"  required value="" placeholder="sala">
		  <input type="text" name="horario"  required value="" placeholder="horario">
          <input type="submit" name="Editar" id="editarHora">
        </form>
      </div>
