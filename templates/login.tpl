<div class="">
  <h3>Log In</h3>
  <form class="formulario" action="mostrar_login" method="post">
    <div class="form-group">
      <input type="email" name="email" value="" placeholder="Email">
      <input type="password" name="pass" value="" placeholder="Contraseña">
      <button type="submit" name="button">Log In</button>
      {if $error==true}
      <h2>Error</h2>
      {/if}
    </div>
  </form>
</div>
