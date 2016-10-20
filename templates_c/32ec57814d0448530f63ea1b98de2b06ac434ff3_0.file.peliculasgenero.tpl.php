<?php
/* Smarty version 3.1.30, created on 2016-10-20 15:47:02
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\peliculasgenero.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5808cad6b6c3b8_97920630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ec57814d0448530f63ea1b98de2b06ac434ff3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\peliculasgenero.tpl',
      1 => 1476917043,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5808cad6b6c3b8_97920630 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
  <div class="col-2-md botones">
    <form class="" id="peliculas_genero" method="post" enctype="multipart/form-data">
      <select name="genero" id="dropdownGenero">
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
      <input type="submit" name="listar" value="Listar">
    </form>
  </div>
</div>
<div class="filtroPelicula">
</div>
<div class="js-visibilidad">
<h2>Agregar Genero</h2>
    <form id="formGenero" action="agregar_genero" method="post" enctype="multipart/form-data">
      <input type="text" name="genero"  required value="" placeholder="Genero">
      <input type="submit" name="Agregar" id="agregarGenero">
    </form>
  </div>
<?php }
}
