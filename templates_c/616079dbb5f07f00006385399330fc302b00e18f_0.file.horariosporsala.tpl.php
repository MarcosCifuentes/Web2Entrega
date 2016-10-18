<?php
/* Smarty version 3.1.30, created on 2016-10-18 05:21:53
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\horariosporsala.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58059551b1c495_55385715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '616079dbb5f07f00006385399330fc302b00e18f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\horariosporsala.tpl',
      1 => 1476760687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58059551b1c495_55385715 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Sala y Horario</h1>
<table class="table">
  <thead>
    <tr>
      <th>Pelicula</th>
      <th>Sala</th>
      <th>Horario</th>
      </tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['horarios']->value, 'horario', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['horario']->value) {
?>
      <tr>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['horario']->value['fk_pelicula'];?>

        </td>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['horario']->value['sala'];?>

        </td>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['horario']->value['horario'];?>

        </td>
        <td>
          <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idturno="<?php echo $_smarty_tpl->tpl_vars['turno']->value['id_turno'];?>
"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        </td>
      </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  </tbody>
</table>

<div class="js-visibilidad">
  <input type="text" name="pelicula"  required value="" placeholder="Pelicula">
  <input type="text" name="sala"  required value="" placeholder="Sala">
  <input type="text" name="horario"  required value="" placeholder="Horario">
  <button type="submit" class="js-agregarPelicula">ENVIAR</button>
</div>
<?php }
}
