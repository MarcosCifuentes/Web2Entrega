<h1>Peliculas Disponibles</h1>
<ul class="list-group">
  {foreach from=$peliculas key=index item=pelicula}
  <li>
    {$pelicula['titulo']}
    <ul>
      <li>{$pelicula['imagen']}</li>
      <li>{$pelicula['fk_genero']}</li>
      <li>{$pelicula['duracion']}</li>
      <li>{$pelicula['descripcion']}</li>
      <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idturno="{$turno['id_turno']}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar Pelicula</a>
    </ul>
  </li>
  {/foreach}
</ul>

<div class="js-visibilidad">
<h2>Agregar Pelicula</h2>
    <form id="formPelicula" action="guardar_pelicula" method="post" enctype="multipart/form-data">
      <input type="text" name="titulo"  required value="" placeholder="Titulo">
      <input type="text" name="duracion"  required value="" placeholder="duracion">
      <input type="text" name="genero"  required value="" placeholder="genero">
      <textarea class="form-control" rows="8" required value="" placeholder="descripcion"></textarea>
      <input type="file" name="imagen" required value="" single>
      <input type="submit" name="Agregar" id="agregarPeliculaBtn">
    </form>
</div>
