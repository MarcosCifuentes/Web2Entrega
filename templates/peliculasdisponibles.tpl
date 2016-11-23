<h1>Peliculas Disponibles</h1>
<ul class="list-group">
  {foreach from=$peliculas key=index item=pelicula}
  <li>
    <a class="peliculaElegida" href="#" name="pelicula" data="{$pelicula['id_pelicula']}"><h2>{$pelicula['titulo']}</h2></a>
  </li>
  {/foreach}
</ul>

{if ($session==true) && ($privilegios == administrador)}
<h2>Agregar Pelicula</h2>
<form class="formulario" action="agregar_pelicula" method="post" enctype="multipart/form-data">
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
  <input type="file" name="imagenes[]" required value="" multiple>
  <input type="submit" name="Agregar" value="Agregar Pelicula" id="agregarPelicula">
</form>
{/if}
