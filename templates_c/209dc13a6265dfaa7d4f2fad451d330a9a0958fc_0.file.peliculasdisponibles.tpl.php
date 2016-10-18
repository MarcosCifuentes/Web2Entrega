<?php
/* Smarty version 3.1.30, created on 2016-10-18 03:59:15
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\peliculasdisponibles.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580581f3abc427_52759043',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '209dc13a6265dfaa7d4f2fad451d330a9a0958fc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\peliculasdisponibles.tpl',
      1 => 1476755945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580581f3abc427_52759043 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Peliculas Disponibles</h1>
<ul class="list-group">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['peliculas']->value, 'pelicula', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['pelicula']->value) {
?>
  <li>
    <?php echo $_smarty_tpl->tpl_vars['pelicula']->value['titulo'];?>

    <ul>
      <li><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['imagen'];?>
</li>
      <li><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['fk_genero'];?>
</li>
      <li><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['duracion'];?>
</li>
      <li><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['descripcion'];?>
</li>
      <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idturno="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['id_pelicula'];?>
"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Eliminar Pelicula</a>
    </ul>
  </li>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul>

<div class="js-visibilidad">
<h2>Agregar Pelicula</h2>
    <form id="formPelicula" action="guardar_pelicula" method="post" enctype="multipart/form-data">
      <input type="text" name="titulo"  required value="" placeholder="Titulo">
      <input type="text" name="duracion"  required value="" placeholder="duracion">
      <select Emp Name='NEW'>
        <option value="">Elegir Genero</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['generos']->value, 'genero', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['genero']->value) {
?>
        <option value=""><?php echo $_smarty_tpl->tpl_vars['genero']->value['genero'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <!-- <?php echo '<?
            ';?>mysql_connect ("localhost","root","");
            mysql_select_db ("company");
            $select="company";
            if (isset ($select)&&$select!=""){
            $select=$_POST ['NEW'];
        }
        <?php echo '?>';?>
        <?php echo '<?
            ';?>$list=mysql_query("select * from employee order by emp_id asc");
        while($row_list=mysql_fetch_assoc($list)){
            <?php echo '?>';?>
                <option value="<?php echo '<? ';?>echo $row_list['emp_id']; <?php echo '?>';?>"<?php echo '<? ';?>if($row_list['emp_id']==$select){ echo "selected"; } <?php echo '?>';?>>
                                     <?php echo '<?'; ?>
echo $row_list['emp_name'];<?php echo '?>';?>
                </option>
            <?php echo '<?
            ';?>}
            <?php echo '?>';?> -->
        </select>
      <textarea class="form-control" rows="8" required value="" placeholder="descripcion"></textarea>
      <input type="file" name="imagen" required value="" single>
      <input type="submit" name="Agregar" id="agregarPeliculaBtn">
    </form>
</div>
<?php }
}
