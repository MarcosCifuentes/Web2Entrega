<h1>Sala y Horario</h1>
<table class="table">
  <thead>
    <tr>
      <th>Pelicula</th>
      <th>Sala</th>
      <th>Horario</th>
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
          <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idturno="{$turno['id_turno']}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        </td>
      </tr>
      {/foreach}
  </tbody>
</table>

<div class="js-visibilidad">
  <input type="text" name="pelicula"  required value="" placeholder="Pelicula">
  <input type="text" name="sala"  required value="" placeholder="Sala">
  <input type="text" name="horario"  required value="" placeholder="Horario">
  <button type="submit" class="js-enviardatos">ENVIAR</button>
</div>
