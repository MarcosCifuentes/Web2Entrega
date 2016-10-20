<div class="row">
  <div class="col-2-md botones">
    <form class="" id="peliculas_genero" method="post" enctype="multipart/form-data">
      <select name="genero" id="dropdownGenero">
        {foreach from=$generos item=genero}
        <option value="{$genero['genero']}">{$genero['genero']}</option>
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
