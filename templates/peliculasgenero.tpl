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
  <div class="col-5-md contenedorFiltro">
    <ul class="list-group">
      {foreach from=$filtroGeneros item=filtrogenero}
      <li>
        {$filtrogenero['titulo']}
        <ul>
          <li><img src="{$filtrogenero['imagen']}" alt="foto"/></li>
          <li>{$filtrogenero['fk_id_genero']}</li>
          <li>{$filtrogenero['duracion']}</li>
          <li>{$filtrogenero['descripcion']}</li>
        </ul>
      </li>
      {/foreach}
    </ul>
    </div>
</div>
<div class="js-visibilidad">
<h2>Agregar Genero</h2>
    <form id="formGenero" action="agregar_genero" method="post" enctype="multipart/form-data">
      <input type="text" name="genero"  required value="" placeholder="Genero">
      <input type="submit" name="Agregar" id="agregarGenero">
    </form>
  </div>
