<div class="editorPelicula">
  <h2>Editar Pelicula</h2>
    <form class="formulario" action="editar_genero" method="post" enctype="multipart/form-data">
      <input  type="hidden" name="id_genero"  value="{$genero['id_genero']}">
      <input  type="text" name="genero"  required value="{$genero['genero']}" placeholder="Genero">
      <input type="submit" name="Editar" >
    </form>
  </div>
