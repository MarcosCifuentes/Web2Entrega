<?php
/* Smarty version 3.1.30, created on 2016-10-20 15:47:04
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\filtroPeliculas.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5808cad8df66e0_70685119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fe156bf0f96479da479eb8f76244eba9b4d79cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\filtroPeliculas.tpl',
      1 => 1476916835,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5808cad8df66e0_70685119 (Smarty_Internal_Template $_smarty_tpl) {
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
          <li><?php echo $_smarty_tpl->tpl_vars['genero']->value['fk_id_genero'];?>
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
    </div><?php }
}
