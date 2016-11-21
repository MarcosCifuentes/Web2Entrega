<?php
/* Smarty version 3.1.30, created on 2016-11-21 04:19:27
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\horariosporsala.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583267bf64c4a5_57405836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '616079dbb5f07f00006385399330fc302b00e18f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\horariosporsala.tpl',
      1 => 1479698350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583267bf64c4a5_57405836 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Sala y Horario</h1>
<table class="table">
  <thead>
    <tr>
      <th>Pelicula</th>
      <th>Sala</th>
      <th>Horario</th>
      <th>Configuracion</th>
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
          <?php echo $_smarty_tpl->tpl_vars['horario']->value['pelicula'];?>

        </td>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['horario']->value['sala'];?>

        </td>
        <td>
          <?php echo $_smarty_tpl->tpl_vars['horario']->value['horario'];?>

        </td>
          <?php if (isset($_smarty_tpl->tpl_vars['session']->value) && ($_smarty_tpl->tpl_vars['privilegios']->value == 'administrador')) {?>
        <td>
          <a  id="eliminarHorario" href="#" data-idhorario="<?php echo $_smarty_tpl->tpl_vars['horario']->value['id_horario'];?>
"><span class="glyphicon glyphicon-remove" ></span></a>
          <a  id="editorHorario" href="#" data-idhorario="<?php echo $_smarty_tpl->tpl_vars['horario']->value['id_horario'];?>
"><span class="glyphicon glyphicon-pencil" ></span></a>
        </td>
          <?php }?>
      </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  </tbody>
</table>

<?php if (isset($_smarty_tpl->tpl_vars['session']->value) && ($_smarty_tpl->tpl_vars['privilegios']->value == 'administrador')) {?>

<div >
<h2>Agregar Horario</h2>
    <form id="formHorario" action="agregar_horario" method="post" enctype="multipart/form-data">
      <div class="">Pelicula:
      <select class="form-control" id="dropdownPelicula" name="genero">
        <option value="">Elegir Pelicula</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['peliculas']->value, 'pelicula');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pelicula']->value) {
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['id_pelicula'];?>
"><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['titulo'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </select>
        </div>
      <input type="text" name="sala"  required value="" placeholder="Sala">
      <input type="text" name="horario"  required value="" placeholder="Horario">
      <input type="submit" name="Agregar" id="agregarHorario">
    </form>
</div>
<?php }
}
}
