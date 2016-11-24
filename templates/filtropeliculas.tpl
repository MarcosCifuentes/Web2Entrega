<div class="col-5-md contenedorFiltro">
    <ul class="list-group">
      {foreach from=$generos item=genero}
      <li>
        <h2>{$genero['titulo']}</h2>
        <ul>
          <div class="">
        <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            {foreach $genero['imagenes'] as $imagen}
            {if $imagen@index eq 0}
            <li data-target="#myCarousel" data-slide-to="{$imagen@index}" class="active"></li>
            {else}
            <li data-target="#myCarousel" data-slide-to="{$imagen@index}"></li>
            {/if}
            {/foreach}
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            {foreach $genero['imagenes'] as $imagen}
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
          <li><h4>Genero</h4>{$genero['genero']}</li>
          <li><h4>Duracion</h4>{$genero['duracion']}<p>minutos</p></li>
          <li><h4>Descripcion</h4>{$genero['descripcion']}</li>
        </ul>
      </li>
      {/foreach}
    </ul>
    </div>
