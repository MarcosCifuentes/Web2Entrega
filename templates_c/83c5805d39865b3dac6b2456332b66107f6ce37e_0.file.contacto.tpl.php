<?php
/* Smarty version 3.1.30, created on 2016-10-18 04:20:18
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\contacto.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580586e2a0d673_35645158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83c5805d39865b3dac6b2456332b66107f6ce37e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\contacto.tpl',
      1 => 1476757202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580586e2a0d673_35645158 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form  class="col-xs-8 col-xs-offset-1 col-md-5 col-md-offset-1 form-group formulario">
    <label for="nombreApellido">Nombre y Apellido</label>
    <input type="text" class="form-control" placeholder="Nombre y Apellido">
    <label for="email">Email</label>
    <input type="text" class="form-control" placeholder="Email">
    <label for="mensaje">Su mensaje</label>
    <textarea class="form-control" rows="8" placeholder="Escriba aquí su mensaje"></textarea>
    <button type="submit" id=js-enviarMensaje class="btn btn-default">Enviar</button>
</form>

<h1>Mensajes Recibidos</h1>
<table class="table">
  <thead>
    <tr>
      <th>Nombre y Apellido</th>
      <th>Email</th>
      <th>Mensaje</th>
      </tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contactos']->value, 'contacto', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['contacto']->value) {
?>
      <tr>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['contacto']->value['nombre y apellido'];?>

        </td>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['contacto']->value['email'];?>

        </td>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['contacto']->value['mensaje'];?>

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
<?php }
}
