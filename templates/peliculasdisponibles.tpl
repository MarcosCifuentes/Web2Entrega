<h1>Peliculas Disponibles</h1>
<ul class="list-group">
  {foreach from=$peliculas key=index item=pelicula}
  <li>
    <h2>{$pelicula['titulo']}</h2>
    <ul>
      <li><img src="{$pelicula['imagen']}" alt="foto"/></li>
      <li><h4>Genero</h4>{$pelicula['fk_id_genero']}</li>
      <li><h4>Duracion</h4>{$pelicula['duracion']}<p>minutos</p></li>
      <li><h4>Descripcion</h4>{$pelicula['descripcion']}</li>
      <div class="panel">
      <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idpelicula="{$pelicula['id_pelicula']}"><span class="glyphicon glyphicon-remove" ></span></a>
      <a class="js-visibilidad" id="editarPelicula" href="#" data-idpelicula="{$pelicula['id_pelicula']}" data-titulo="{$pelicula['titulo']}" data-duracion="{$pelicula['duracion']}" data-genero="{$pelicula['fk_id_genero']}" data-desripcion="{$pelicula['descripcion']}" data-imagen="{$pelicula['imagen']}"><span class="glyphicon glyphicon-pencil" ></span></a>
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
        <option value="{$genero['id_genero']}">{$genero['genero']}</option>
        {/foreach}
        </select>
        </div>
      <textarea class="form-control" rows="8" type="text" name="descripcion" required value="" placeholder="descripcion"></textarea>
      <input type="file" name="imagen" required value="" single>
      <input type="submit" name="Agregar" id="agregarPelicula">
    </form>
    <div class="editorPelicula">
      <h2>Editar Pelicula</h2>
        <form id="formEditPelicula" action="editar_pelicula" method="post" enctype="multipart/form-data">
		  <input id="input_id_pelicula" type="hidden" name="idpelicula"  value="">
          <input id="input_titulo" type="text" name="titulo"  required value="" placeholder="Titulo">
          <input id="input_duracion" type="text" name="duracion"  required value="" placeholder="duracion">
          <div class="">Genero:
          <select class="form-control" id="input_id_genero"  name="genero">
            <option value="">Elegir Genero</option>
            {foreach from=$generos item=genero}
            <option value="{$genero['genero']}">{$genero['genero']}</option>
            {/foreach}
            </select>
            </div>
          <textarea id="input_descripcion" class="form-control" rows="8" type="text" name="descripcion" required value="" placeholder="descripcion"></textarea>
          <input id="input_imagen" type="file" name="imagen" required value="" single>
		  <input type="submit" name="Editar" id="editarPeli">
        </form>
      </div>
</div>
