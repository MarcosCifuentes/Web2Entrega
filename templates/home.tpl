<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="./images/combo1.jpg" alt="Combo1">
    </div>

    <div class="item">
      <img src="./images/combo2.jpg"alt="Combo2">
    </div>

    <div class="item">
      <img src="./images/combo3.jpg" alt="Combo3">
    </div>

    <div class="item">
      <img src="./images/combo4.jpg" alt="Combo4">
    </div>
  </div>

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

<div class="">

  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-3">
      <p>Incluye: 1 Bag Mediano de Pochoclos + 1 Gaseosa + 1 Vaso Litro Coleccionable + 1 recarga de pochoclos</p>

    </div>
    <div class="col-md-3">
      <p>Todos los jueves 2 x 1</p>

   </div>
    <div class="col-md-3">
      <p>15% de descuento con con Easy club y LosAndes club</p>

    </div>
    <div class="col-md-3">
      <p>2 boletos + 2 refrescos grandes  + pochoclos grandes</p>

    </div>
  </div>

  <hr>
  <div class="">
    {if ($session==true) && ($privilegios == administrador)}<a class="bg-primary consulta_js" name="administrar_usuarios" href="#" rel="adminUser">Administrar Usuarios<span class="sr-only">(Administrar Usuarios)</span></a>{/if}
    {if ($session==false)}<a class="bg-primary consulta_js" name="mostrar_register" href="#" rel="registrar">Registrar<span class="sr-only">(Registrar)</span></a>{/if}
    {if ($session==false)}<a class="bg-primary consulta_js" name="mostrar_login" href="#" rel="login">Login<span class="sr-only">(Login)</span></a>{/if}
    {if ($session==true)}<a class="bg-primary consulta_js" name="logout"><button class="bg-primary " name="logout" type="submit">Cerrar Sesión</button></a>{/if}
  </div>
