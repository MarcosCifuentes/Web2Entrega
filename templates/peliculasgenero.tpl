<div class="row">
  <h1>Buscar Peliculas por Genero</h1>
  <div class="col-2-md botones">
    <form class="" id="peliculas_genero" method="post" enctype="multipart/form-data">
      <select name="genero" id="dropdownGenero">
        {foreach from=$generos item=genero}
        <option value="{$genero['id_genero']}">{$genero['genero']}</option>
        {/foreach}
      </select>
      <input type="submit" name="listar" value="Listar">
    </form>
  </div>
</div>
<div class="filtroPelicula">
</div>
<div class="js-visibilidad">
<h2>Agregar Genero</h2>
    <form id="formGenero" action="agregar_genero" method="post" enctype="multipart/form-data">
      <input type="text" name="genero"  required value="" placeholder="Genero">
      <input type="submit" name="Agregar" id="agregarGenero">
    </form>
  </div>
  <div class="row">
    <h2>Eliminar Genero</h2>
    <div class="col-2-md botones">
      <form class="" id="eliminar_peliculas_genero" method="post" enctype="multipart/form-data">
        <select name="genero" id="dropdownEliminarGenero">
          {foreach from=$generos item=genero}
          <option value="{$genero['id_genero']}">{$genero['genero']}</option>
          {/foreach}
        </select>
        <input type="submit" name="eliminar" value="Eliminar Genero">
      </form>
    </div>
  </div>
