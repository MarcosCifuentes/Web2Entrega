<form  class="col-xs-8 col-xs-offset-1 col-md-5 col-md-offset-1 form-group formulario">
    <label for="nombreApellido">Nombre y Apellido</label>
    <input type="text" class="form-control" placeholder="Nombre y Apellido">
    <label for="nombreApellido">Email</label>
    <input type="text" class="form-control" placeholder="Email">
    <label for="mensaje">Su mensaje</label>
    <textarea class="form-control" rows="8" placeholder="Escriba aquí su mensaje"></textarea>
    <button type="submit" class="btn btn-default">Enviar</button>
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
      {foreach from=$contactos key=index item=contacto}
      <tr>
        <td>
          {$contacto['nombre y apellido']}
        </td>
        <td>
          {$contacto['email']}
        </td>
        <td>
          {$contacto['mensaje']}
        </td>
        <td>
          <a class="js-visibilidad" id="eliminarPelicula" href="#" data-idturno="{$turno['id_turno']}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
        </td>
      </tr>
      {/foreach}
  </tbody>
</table>
