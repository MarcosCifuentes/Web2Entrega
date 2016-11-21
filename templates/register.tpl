<div class="panel">
  <h3>Crear Cuenta</h3>
  <form class="formulario" action="register" method="post">
    <input type="email" name="email" value="" placeholder="E-mail">
    <input type="password" name="pass" value="" placeholder="Contraseña">
    <button type="submit" name="button">Crear</button>
  </form>
</div>
{if isset($session) && ($privilegios == administrador)}
<table class="table">
  <thead>
    <tr>
      <th>Usuario</th>
      <th>Privilegio</th>
      <th>Configuracion</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$usuarios key=index item=usuario}
    <tr>
      <td>
        {$usuario['email']}
      </td>
      <td>
        {$usuario['privilegio']}
      </td>
      <td>
        <a  id="editorUsuario" href="#" data-email="{$usuario['email']}"><span class="glyphicon glyphicon-pencil" ></span></a>
      </td>
    </tr>
    {/foreach}
  </tbody>
</table>
{/if}
