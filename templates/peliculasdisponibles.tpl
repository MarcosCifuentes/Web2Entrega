<h1>Peliculas Disponibles</h1>
<ul class="list-group">
  {foreach from=$peliculas key=index item=pelicula}
  <li>
    {$pelicula['titulo']}
    <ul>
      <li><img src="{$pelicula['imagen']}" alt="foto"/></li>
      <li>{$pelicula['fk_id_genero']}</li>
      <li>{$pelicula['duracion']}</li>
      <li>{$pelicula['descripcion']}</li>
      <div class="panel">
      <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idpelicula="{$pelicula['id_pelicula']}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
      <a class="js-visibilidad" id="editarPelicula" href="#" data-idpelicula="{$pelicula['id_pelicula']}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
      </div>
    </ul>
  </li>
  {/foreach}
</ul>

<div class="js-visibilidad">
<h2>Agregar Pelicula</h2>
    <form id="formPelicula" action="agregar_pelicula" method="post" enctype="multipart/form-data">
      <input type="text" name="titulo"  required value="" placeholder="Titulo">
      <input type="text" name="duracion"  required value="" placeholder="duracion">
      <div class="">Genero:
      <select class="form-control"  name="genero">
        <option value="">Elegir Genero</option>
        {foreach from=$generos item=genero}
        <option value="{$genero['genero']}">{$genero['genero']}</option>
        {/foreach}
        </select>
        </div>
      <textarea class="form-control" rows="8" type="text" name="descripcion" required value="" placeholder="descripcion"></textarea>
      <input type="file" name="imagen" required value="" single>
      <input type="submit" name="Agregar" id="agregarPelicula">
    </form>
</div>
