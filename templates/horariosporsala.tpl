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
          {if isset($session) && ($privilegios == administrador)}
        <td>
          <a  id="eliminarHorario" href="#" data-idhorario="{$horario['id_horario']}"><span class="glyphicon glyphicon-remove" ></span></a>
          <a  id="editorHorario" href="#" data-idhorario="{$horario['id_horario']}"><span class="glyphicon glyphicon-pencil" ></span></a>
        </td>
          {/if}
      </tr>
      {/foreach}
  </tbody>
</table>

{if isset($session) && ($privilegios == administrador)}

<div >
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
{/if}
