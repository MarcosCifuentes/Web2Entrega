<?php
/* Smarty version 3.1.30, created on 2016-10-31 01:41:00
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\peliculasgenero.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5816931c3de5a1_20617003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ec57814d0448530f63ea1b98de2b06ac434ff3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\peliculasgenero.tpl',
      1 => 1477521177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5816931c3de5a1_20617003 (Smarty_Internal_Template $_smarty_tpl) {
if (!isset($_smarty_tpl->tpl_vars['admin']->value)) {?>
<div class="row">
  <h1>Buscar Peliculas por Genero</h1>
  <div class="col-2-md botones">
    <form class="" id="peliculas_genero" method="post" enctype="multipart/form-data">
      <select name="genero" id="dropdownGenero">
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
      <input type="submit" name="listar" value="Listar por Genero">
    </form>
  </div>
</div>
<div class="filtroPelicula">
</div>
<?php }
if (isset($_smarty_tpl->tpl_vars['admin']->value)) {?>
<h2>Agregar Genero</h2>
    <form id="formGenero" action="agregar_genero" method="post" enctype="multipart/form-data">
      <input type="text" name="genero"  required value="" placeholder="Genero">
      <input type="submit" name="Agregar" value="Agregar Genero" id="agregarGenero">
    </form>
  <div class="row">
    <h2>Eliminar Genero</h2>
    <div class="col-2-md botones">
      <form class="" id="eliminar_peliculas_genero" method="post" enctype="multipart/form-data">
        <input  type="hidden" name="id_genero"  value="<?php echo $_smarty_tpl->tpl_vars['genero']->value['id_genero'];?>
">
        <select name="genero" id="dropdownEliminarGenero">
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
        <input type="submit" name="eliminar" value="Eliminar Genero">
      </form>
    </div>
  </div>
  <h2>Editar Genero</h2>
    <form class="formulario" action="editar_genero" method="post" enctype="multipart/form-data">
      <div class="">Genero:
      <select class="form-control"  name="id_genero">
        <option value="">Elegir Genero</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['generos']->value, 'genero');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['genero']->value) {
?>
        <option name="id_genero" value="<?php echo $_smarty_tpl->tpl_vars['genero']->value['id_genero'];?>
"><?php echo $_smarty_tpl->tpl_vars['genero']->value['genero'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </select>
        <input  type="text" name="generonuevo"  required value="" placeholder="Genero">
        </div>
      <input type="submit" name="Editar" value="Editar Genero" >
    </form>
<?php }
}
}