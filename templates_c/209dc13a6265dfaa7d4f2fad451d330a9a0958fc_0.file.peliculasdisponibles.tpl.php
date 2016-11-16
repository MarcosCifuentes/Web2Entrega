<?php
/* Smarty version 3.1.30, created on 2016-11-16 02:26:07
  from "C:\xampp\htdocs\proyectos\Web2Entrega\templates\peliculasdisponibles.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582bb5af2fa299_59665930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '209dc13a6265dfaa7d4f2fad451d330a9a0958fc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyectos\\Web2Entrega\\templates\\peliculasdisponibles.tpl',
      1 => 1478875007,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582bb5af2fa299_59665930 (Smarty_Internal_Template $_smarty_tpl) {
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
      <div class="container">
    <br>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pelicula']->value['imagenes'], 'imagen');
$_smarty_tpl->tpl_vars['imagen']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['imagen']->value) {
$_smarty_tpl->tpl_vars['imagen']->index++;
$__foreach_imagen_1_saved = $_smarty_tpl->tpl_vars['imagen'];
?>
        <?php if ($_smarty_tpl->tpl_vars['imagen']->index == 0) {?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['imagen']->index;?>
" class="active"></li>
        <?php } else { ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['imagen']->index;?>
"></li>
        <?php }?>
        <?php
$_smarty_tpl->tpl_vars['imagen'] = $__foreach_imagen_1_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pelicula']->value['imagenes'], 'imagen');
$_smarty_tpl->tpl_vars['imagen']->index = -1;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['imagen']->value) {
$_smarty_tpl->tpl_vars['imagen']->index++;
$__foreach_imagen_2_saved = $_smarty_tpl->tpl_vars['imagen'];
?>
        <?php if ($_smarty_tpl->tpl_vars['imagen']->index == 0) {?>
        <div class="item active">
          <img class="carrusel" src="<?php echo $_smarty_tpl->tpl_vars['imagen']->value['path'];?>
" alt="Chania" >
        </div>
        <?php } else { ?>
        <div class="item">
          <img class="carrusel" src="<?php echo $_smarty_tpl->tpl_vars['imagen']->value['path'];?>
" alt="Chania">
        </div>
        <?php }?>
        <?php
$_smarty_tpl->tpl_vars['imagen'] = $__foreach_imagen_2_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
</div>
      <li><h4>Genero</h4><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['genero'];?>
</li>
      <li><h4>Duracion</h4><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['duracion'];?>
<p>minutos</p></li>
      <li><h4>Descripcion</h4><?php echo $_smarty_tpl->tpl_vars['pelicula']->value['descripcion'];?>
</li>
      <div class="panel">
        <?php if (isset($_smarty_tpl->tpl_vars['admin']->value)) {?>
      <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idpelicula="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['id_pelicula'];?>
"><span class="glyphicon glyphicon-remove" ></span></a>
      <a class="js-visibilidad" id="editorPelicula" href="#" data-idpelicula="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value['id_pelicula'];?>
" ><span class="glyphicon glyphicon-pencil" ></span></a>
        <?php }?>
      </div>
    </ul>
  </li>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</ul>

<?php if (isset($_smarty_tpl->tpl_vars['admin']->value)) {?>
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
      <input type="file" name="imagenes[]" required value="" multiple>
      <input type="submit" name="Agregar" value="Agregar Pelicula" id="agregarPelicula">
    </form>
<?php }
}
}
