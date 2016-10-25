<?php
/* Smarty version 3.1.30, created on 2016-10-25 03:57:05
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\editargenero.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580ebbf181f351_14644189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3747a5c9c6bb370dc084baab4fe5cf61e14a4540' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\editargenero.tpl',
      1 => 1477360620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580ebbf181f351_14644189 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="editorPelicula">
  <h2>Editar Pelicula</h2>
    <form class="formulario" action="editar_genero" method="post" enctype="multipart/form-data">
      <input  type="hidden" name="id_genero"  value="<?php echo $_smarty_tpl->tpl_vars['genero']->value['id_genero'];?>
">
      <input  type="text" name="genero"  required value="<?php echo $_smarty_tpl->tpl_vars['genero']->value['genero'];?>
" placeholder="Genero">
      <input type="submit" name="Editar" >
    </form>
  </div>
<?php }
}
