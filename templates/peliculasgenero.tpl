<div class="row">
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
  <div class="col-5-md contenedorFiltro">

    </div>
</div>
