<div>
  <h2>Editar Pelicula</h2>
    <form class="formulario" action="editar_pelicula" method="post" enctype="multipart/form-data">
      <input  type="hidden" name="id_pelicula"  value="{$pelicula['id_pelicula']}">
      <input  type="text" name="titulo"  required value="{$pelicula['titulo']}" placeholder="Titulo">
      <input type="text" name="duracion"  required value="{$pelicula['duracion']}" placeholder="duracion">
      <div class="">Genero:
      <select class="form-control"  name="genero">
        <option value="">Elegir Genero</option>
        {foreach from=$generos item=genero}
        <option name="genero" value="{$genero['id_genero']}">{$genero['genero']}</option>
        {/foreach}
        </select>
        </div>
      <textarea  class="form-control" rows="8" type="text" name="descripcion" required value="" placeholder="descripcion">{$pelicula['descripcion']}</textarea>
      <input type="file" name="imagenes[]" required value="" multiple>
      <input type="submit" name="Editar" >
    </form>
  </div>
