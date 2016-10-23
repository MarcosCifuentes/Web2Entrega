<div class="col-5-md contenedorFiltro">
    <ul class="list-group">
      {foreach from=$generos item=genero}
      <li>
        {$genero['titulo']}
        <ul>
          <li><img src="{$genero['imagen']}" alt="foto"/></li>
          <li>{$genero['genero']}</li>
          <li>{$genero['duracion']}</li>
          <li>{$genero['descripcion']}</li>
        </ul>
      </li>
      {/foreach}
    </ul>
    </div>
