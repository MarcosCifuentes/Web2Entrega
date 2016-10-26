<h1>Peliculas Disponibles</h1>
<ul class="list-group">
  {foreach from=$peliculas key=index item=pelicula}
  <li>
    <h2>{$pelicula['titulo']}</h2>
    <ul>
      <li><img src="{$pelicula['imagen']}" alt="foto"/></li>
      <li><h4>Genero</h4>{$pelicula['genero']}</li>
      <li><h4>Duracion</h4>{$pelicula['duracion']}<p>minutos</p></li>
      <li><h4>Descripcion</h4>{$pelicula['descripcion']}</li>
      <div class="panel">
        {if isset($admin)}
      <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idpelicula="{$pelicula['id_pelicula']}"><span class="glyphicon glyphicon-remove" ></span></a>
      <a class="js-visibilidad" id="editorPelicula" href="#" data-idpelicula="{$pelicula['id_pelicula']}" ><span class="glyphicon glyphicon-pencil" ></span></a>
        {/if}
      </div>
    </ul>
  </li>
  {/foreach}
</ul>

{if isset($admin)}
<h2>Agregar Pelicula</h2>
    <form id="formPelicula" action="agregar_pelicula" method="post" enctype="multipart/form-data">
      <input type="text" name="titulo"  required value="" placeholder="Titulo">
      <input type="text" name="duracion"  required value="" placeholder="duracion">
      <div class="">Genero:
      <select class="form-control"  name="genero">
        <option value="">Elegir Genero</option>
        {foreach from=$generos item=genero}
        <option value="{$genero['id_genero']}">{$genero['genero']}</option>
        {/foreach}
        </select>
        </div>
      <textarea class="form-control" rows="8" type="text" name="descripcion" required value="" placeholder="descripcion"></textarea>
      <input type="file" name="imagen" required value="" single>
      <input type="submit" name="Agregar" value="Agregar Pelicula" id="agregarPelicula">
    </form>
{/if}
