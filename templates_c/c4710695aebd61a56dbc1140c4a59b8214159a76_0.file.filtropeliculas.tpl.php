<?php
/* Smarty version 3.1.30, created on 2016-10-23 23:34:13
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\filtropeliculas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580d2cd5eedd43_97976380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4710695aebd61a56dbc1140c4a59b8214159a76' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\filtropeliculas.tpl',
      1 => 1477063830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580d2cd5eedd43_97976380 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-5-md contenedorFiltro">
    <ul class="list-group">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['generos']->value, 'genero');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['genero']->value) {
?>
      <li>
        <?php echo $_smarty_tpl->tpl_vars['genero']->value['titulo'];?>

        <ul>
          <li><img src="<?php echo $_smarty_tpl->tpl_vars['genero']->value['imagen'];?>
" alt="foto"/></li>
          <li><?php echo $_smarty_tpl->tpl_vars['genero']->value['genero'];?>
</li>
          <li><?php echo $_smarty_tpl->tpl_vars['genero']->value['duracion'];?>
</li>
          <li><?php echo $_smarty_tpl->tpl_vars['genero']->value['descripcion'];?>
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
<?php }
}
