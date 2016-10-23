<?php
/* Smarty version 3.1.30, created on 2016-10-23 23:34:06
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\peliculasdisponibles.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580d2cce3fc797_50841578',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '209dc13a6265dfaa7d4f2fad451d330a9a0958fc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\peliculasdisponibles.tpl',
      1 => 1477062282,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580d2cce3fc797_50841578 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Peliculas Disponibles</h1>
<ul class="list-group">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['peliculas']->value, 'pelicula', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['pelicula']->value) {
?>
  <li>
    <h2><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['titulo'];?>
</h2>
    <ul>
      <li><img src="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['imagen'];?>
" alt="foto"/></li>
      <li><h4>Genero</h4><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['genero'];?>
</li>
      <li><h4>Duracion</h4><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['duracion'];?>
<p>minutos</p></li>
      <li><h4>Descripcion</h4><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['descripcion'];?>
</li>
      <div class="panel">
      <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idpelicula="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['id_pelicula'];?>
"><span class="glyphicon glyphicon-remove" ></span></a>
      <a class="js-visibilidad" id="editarPelicula" href="#" data-idpelicula="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['id_pelicula'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['titulo'];?>
" data-duracion="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['duracion'];?>
" data-genero="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['fk_id_genero'];?>
" data-desripcion="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['descripcion'];?>
" data-imagen="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['imagen'];?>
"><span class="glyphicon glyphicon-pencil" ></span></a>
      </div>
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
    <form id="formPelicula" action="agregar_pelicula" method="post" enctype="multipart/form-data">
      <input type="text" name="titulo"  required value="" placeholder="Titulo">
      <input type="text" name="duracion"  required value="" placeholder="duracion">
      <div class="">Genero:
      <select class="form-control"  name="genero">
        <option value="">Elegir Genero</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['generos']->value, 'genero');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['genero']->value) {
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['genero']->value['id_genero'];?>
"><?php echo $_smarty_tpl->tpl_vars['genero']->value['genero'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </select>
        </div>
      <textarea class="form-control" rows="8" type="text" name="descripcion" required value="" placeholder="descripcion"></textarea>
      <input type="file" name="imagen" required value="" single>
      <input type="submit" name="Agregar" id="agregarPelicula">
    </form>
    <div class="editorPelicula">
      <h2>Editar Pelicula</h2>
        <form id="formEditPelicula" action="editar_pelicula" method="post" enctype="multipart/form-data">
		  <input id="input_id_pelicula" type="hidden" name="idpelicula"  value="">
          <input id="input_titulo" type="text" name="titulo"  required value="" placeholder="Titulo">
          <input id="input_duracion" type="text" name="duracion"  required value="" placeholder="duracion">
          <div class="">Genero:
          <select class="form-control" id="input_id_genero"  name="genero">
            <option value="">Elegir Genero</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['generos']->value, 'genero');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['genero']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['genero']->value['genero'];?>
"><?php echo $_smarty_tpl->tpl_vars['genero']->value['genero'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </select>
            </div>
          <textarea id="input_descripcion" class="form-control" rows="8" type="text" name="descripcion" required value="" placeholder="descripcion"></textarea>
          <input id="input_imagen" type="file" name="imagen" required value="" single>
		  <input type="submit" name="Editar" id="editarPeli">
        </form>
      </div>
</div>
<?php }
}
