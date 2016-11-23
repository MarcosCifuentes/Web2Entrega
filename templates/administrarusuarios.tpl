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
        <a  class="consulta_js" href="#" name="editor_usuario" data="{$usuario['email']}"><span class="glyphicon glyphicon-pencil" ></span></a>
      </td>
    </tr>
    {/foreach}
  </tbody>
</table>
