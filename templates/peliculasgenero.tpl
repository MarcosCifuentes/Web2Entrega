
<div class="row">
  <h1>Buscar Peliculas por Genero</h1>
  <div class="col-2-md botones">
    <form class="" id="peliculas_genero" method="post" enctype="multipart/form-data">
      <select name="genero" id="dropdownGenero">
        {foreach from=$generos item=genero}
        <option value="{$genero['id_genero']}">{$genero['genero']}</option>
        {/foreach}
      </select>
      <input type="submit" name="listar" value="Listar por Genero">
    </form>
  </div>
</div>
<div class="filtroPelicula">
</div>

{if ($session==true) && ($privilegios == administrador)}
<h2>Agregar Genero</h2>
    <form class="formulario" action="agregar_genero" method="post" enctype="multipart/form-data">
      <input type="text" name="genero"  required value="" placeholder="Genero">
      <input type="submit" name="Agregar" value="Agregar Genero" id="agregarGenero">
    </form>
  <div class="row">
    <h2>Eliminar Genero</h2>
    <div class="col-2-md botones">
      <form class="formulario" action="eliminar_genero" method="post" enctype="multipart/form-data">
        <select name="genero" id="dropdownEliminarGenero">
          {foreach from=$generos item=genero}
          <option value="{$genero['id_genero']}">{$genero['genero']}</option>
          {/foreach}
        </select>
        <input type="submit" name="eliminar" value="Eliminar Genero">
      </form>
    </div>
  </div>
  <h2>Editar Genero</h2>
    <form class="formulario" action="editar_genero" method="post" enctype="multipart/form-data">
      <div class="">Genero:
      <select class="form-control"  name="id_genero">
        <option value="">Elegir Genero</option>
        {foreach from=$generos item=genero}
        <option name="id_genero" value="{$genero['id_genero']}">{$genero['genero']}</option>
        {/foreach}
        </select>
        <input  type="text" name="generonuevo"  required value="" placeholder="Genero">
        </div>
      <input type="submit" name="Editar" value="Editar Genero" >
    </form>
{/if}
