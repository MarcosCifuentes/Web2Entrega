<h1>Peliculas Disponibles</h1>
<ul class="list-group">
  {foreach from=$peliculas key=index item=pelicula}
  <li>
    {$pelicula['titulo']}
    <ul>
      <li>{$pelicula['imagen']}</li>
      <li>{$pelicula['fk_genero']}</li>
      <li>{$pelicula['duracion']}</li>
      <li>{$pelicula['descripcion']}</li>
      <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idturno="{$pelicula['id_pelicula']}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar Pelicula</a>
    </ul>
  </li>
  {/foreach}
</ul>

<div class="js-visibilidad">
<h2>Agregar Pelicula</h2>
    <form id="formPelicula" action="guardar_pelicula" method="post" enctype="multipart/form-data">
      <input type="text" name="titulo"  required value="" placeholder="Titulo">
      <input type="text" name="duracion"  required value="" placeholder="duracion">
      <select Emp Name='NEW'>
        <option value="">Elegir Genero</option>
        {foreach from=$generos key=index item=genero}
        <option value="">{$genero['genero']}</option>
        {/foreach}
        <!-- <?
            mysql_connect ("localhost","root","");
            mysql_select_db ("company");
            $select="company";
            if (isset ($select)&&$select!=""){
            $select=$_POST ['NEW'];
        }
        ?>
        <?
            $list=mysql_query("select * from employee order by emp_id asc");
        while($row_list=mysql_fetch_assoc($list)){
            ?>
                <option value="<? echo $row_list['emp_id']; ?>"<? if($row_list['emp_id']==$select){ echo "selected"; } ?>>
                                     <?echo $row_list['emp_name'];?>
                </option>
            <?
            }
            ?> -->
        </select>
      <textarea class="form-control" rows="8" required value="" placeholder="descripcion"></textarea>
      <input type="file" name="imagen" required value="" single>
      <input type="submit" name="Agregar" id="agregarPeliculaBtn">
    </form>
</div>
