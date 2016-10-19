<?php
/* Smarty version 3.1.30, created on 2016-10-19 17:54:14
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\peliculasgenero.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58079726dbb308_30938633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32ec57814d0448530f63ea1b98de2b06ac434ff3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\peliculasgenero.tpl',
      1 => 1476892451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58079726dbb308_30938633 (Smarty_Internal_Template $_smarty_tpl) {
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
  <div class="col-5-md contenedorFiltro">
    <ul class="list-group">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['filtroGeneros']->value, 'filtrogenero');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['filtrogenero']->value) {
?>
      <li>
        <?php echo $_smarty_tpl->tpl_vars['filtrogenero']->value['titulo'];?>

        <ul>
          <li><img src="<?php echo $_smarty_tpl->tpl_vars['filtrogenero']->value['imagen'];?>
" alt="foto"/></li>
          <li><?php echo $_smarty_tpl->tpl_vars['filtrogenero']->value['fk_id_genero'];?>
</li>
          <li><?php echo $_smarty_tpl->tpl_vars['filtrogenero']->value['duracion'];?>
</li>
          <li><?php echo $_smarty_tpl->tpl_vars['filtrogenero']->value['descripcion'];?>
</li>
        </ul>
      </li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
    </div>
</div>
<?php }
}
