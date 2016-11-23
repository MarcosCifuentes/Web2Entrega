<div>
<h2>Envienos Su Mensaje</h2>
    <form class="formulario" action="enviar_mensaje" method="post" enctype="multipart/form-data">
      <input type="text" name="nombreyapellido"  required value="" placeholder="Nombre y Apellido">
      <input type="text" name="email"  required value="" placeholder="Email">
      <textarea class="form-control" rows="8" type="text" name="mensaje" required value="" placeholder="Mensaje"></textarea>
      <input type="submit" name="Enviar" id="enviarMensaje">
    </form>
</div>

{if ($session==true) && ($privilegios == administrador)}
<div class="js-visibilidad">
<h1>Mensajes Recibidos</h1>
<table class="table">
  <thead>
    <tr>
      <th>Nombre y Apellido</th>
      <th>Email</th>
      <th>Mensaje</th>
      <th>Configuracion</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$contactos key=index item=contacto}
      <tr>
        <td>
          {$contacto['nombreyapellido']}
        </td>
        <td>
          {$contacto['email']}
        </td>
        <td>
          {$contacto['mensaje']}
        </td>
        <td>
          <a class="consulta_js" href="#" name="eliminar_mensaje" data="{$contacto['id_contacto']}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        </td>
      </tr>
      {/foreach}
  </tbody>
</table>
</div>
{/if}
