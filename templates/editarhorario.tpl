<div>
  <h2>Editar Horario</h2>
  <form class="formulario" action="editar_horario" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_horario"  value="{$horario['id_horario']}">
    <div class="">Pelicula:
    <select class="form-control" id="dropdownPelicula" name="pelicula">
      <option value="">Elegir Pelicula</option>
      {foreach from=$peliculas item=pelicula}
      <option value="{$pelicula['id_pelicula']}">{$pelicula['titulo']}</option>
      {/foreach}
      </select>
      </div>
    <input type="text" name="sala"  required value="{$horario['sala']}" placeholder="sala">
    <input type="text" name="horario"  required value="{$horario['horario']}" placeholder="horario">
    <input type="submit" name="Editar" >
  </form>
</div>
