<ul class="list-group">
  <li>
    <h2>{$pelicula['titulo']}</h2>
    <ul>
      {if ($session==true) && ($privilegios == administrador)}
      {foreach $pelicula['imagenes'] as $imagen}
      <img src="{$imagen['path']}" alt="Chania">
      <a class="consulta_js" href="#" name="eliminar_imagen" data="{$imagen['id_imagen']}"><span class="glyphicon glyphicon-remove" ></span></a>
      {/foreach}
      {/if}

      {if (($session==false) || (($session==true) && ($privilegios == usuario)))}
      <div class="">
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
      {/if}
      <li><h4>Genero</h4>{$pelicula['genero']}</li>
      <li><h4>Duracion</h4>{$pelicula['duracion']}<p>minutos</p></li>
      <li><h4>Descripcion</h4>{$pelicula['descripcion']}</li>
      <div class="panel">
        <h2>Comentarios</h2>
        <div class=" panel" id="div-com">

        </div>
        {if ($session==true) && ($privilegios == usuario)}
        <form class="form-inline crearComentario" method="post">
          <select class="puntuacion-api" name="puntaje">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <input maxlength=60 class="coment-api" type="text" name="comentario" placeholder="Comentario">
          <input class="id_pelicula-api" type="hidden" name="id_pelicula" value="{$pelicula['id_pelicula']}">
          <button class="" type="submit" name="button">Comentar</button>
        </form>
        {/if}
      </div>
      {if ($session==true) && ($privilegios == administrador)}
      <div class="panel">
        <a  class="consulta_js" href="#" name="eliminar_pelicula" data="{$pelicula['id_pelicula']}"><span class="glyphicon glyphicon-remove" ></span></a>
        <a  class="consulta_js" href="#" name="editor_pelicula" data="{$pelicula['id_pelicula']}" ><span class="glyphicon glyphicon-pencil" ></span></a>
      </div>
      {/if}
    </ul>
  </li>
</ul>
