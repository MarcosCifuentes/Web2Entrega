<div>
  <h2>Editar Usuario</h2>
    <form class="formulario" action="editar_usuario" method="post" enctype="multipart/form-data">
      <input  type="hidden" name="email"  value="{$usuario['email']}">
      <select class="puntaje-api" name="privilegio">
        <option value="administrador">administrador</option>
        <option value="usuario">usuario</option>
      </select>
      <input type="submit" name="Editar" >
    </form>
  </div>
