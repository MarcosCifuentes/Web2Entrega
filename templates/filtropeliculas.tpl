<div class="col-5-md contenedorFiltro">
    <ul class="list-group">
      {foreach from=$generos item=genero}
      <li>
        <h2>{$genero['titulo']}</h2>
        <ul>
          <li><img src="{$genero['imagen']}" alt="foto"/></li>
          <li><h4>Genero</h4>{$genero['genero']}</li>
          <li><h4>Duracion</h4>{$genero['duracion']}<p>minutos</p></li>
          <li><h4>Descripcion</h4>{$genero['descripcion']}</li>
        </ul>
      </li>
      {/foreach}
    </ul>
    </div>
