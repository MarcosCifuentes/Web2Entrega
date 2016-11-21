<h1>Peliculas Disponibles</h1>
<ul class="list-group">
  {foreach from=$peliculas key=index item=pelicula}
  <li>
    <h2>{$pelicula['titulo']}</h2>
    <ul>
      <div class="container">
        <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            {foreach $pelicula['imagenes'] as $imagen}
            {if $imagen@index eq 0}
            <li data-target="#myCarousel" data-slide-to="{$imagen@index}" class="active"></li>
            {else}
            <li data-target="#myCarousel" data-slide-to="{$imagen@index}"></li>
            {/if}
            {/foreach}
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            {foreach $pelicula['imagenes'] as $imagen}
            {if $imagen@index eq 0}
            <div class="item active">
              <img class="carrusel" src="{$imagen['path']}" alt="Chania" >
            </div>
            {else}
            <div class="item">
              <img class="carrusel" src="{$imagen['path']}" alt="Chania">
            </div>
            {/if}
            {/foreach}
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <li><h4>Genero</h4>{$pelicula['genero']}</li>
      <li><h4>Duracion</h4>{$pelicula['duracion']}<p>minutos</p></li>
      <li><h4>Descripcion</h4>{$pelicula['descripcion']}</li>
      <div class="panel">
        <h2>Comentarios</h2>
        <div class="container panel" id="div-com">

        </div>
        {if ($session==true) && ($privilegios == usuario)}
        <form class="form-inline crearComentario" href="api/ComentariosApi" method="post">
          <select class="puntaje-api" name="puntaje">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <input maxlength=60 class="text-api" type="text" name="comentario" placeholder="Comentario...">
          <input class="id_pelicula-api" type="hidden" name="id_pelicula" value="{$pelicula['id_pelicula']}">
          <button class="" type="submit" name="button">Comentar</button>
        </form>
        {/if}
      </div>
      {if ($session==true) && ($privilegios == administrador)}
      <div class="panel">
        <a  class="eliminarPelicula" href="#" data-idpelicula="{$pelicula['id_pelicula']}"><span class="glyphicon glyphicon-remove" ></span></a>
        <a  class="editorPelicula" href="#" data-idpelicula="{$pelicula['id_pelicula']}" ><span class="glyphicon glyphicon-pencil" ></span></a>
      </div>
      {/if}
    </ul>
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
