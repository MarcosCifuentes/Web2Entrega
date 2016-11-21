{include file="header.tpl" }
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Ver/Ocultar Menú</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="#" id="js-home" rel="home">Cinema False<span class="sr-only">(Cinema False)</span></a></li>
          <li><a href="#" id="js-peliculasdisponibles" rel="peliculasdisponibles">Peliculas Disponibles<span class="sr-only">(Peliculas Disponibles)</span></a></li>
          <li><a href="#" id="js-peliculasgenero" rel="peliculasgenero">Peliculas por Genero<span class="sr-only">(Peliculas por Genero)</span></a></li>
          <li><a href="#" id="js-horariosporsala" rel="horariosporsala">Horarios por Sala<span class="sr-only">(Horarios por Sala)</span></a></li>
          <li><a href="#" id="js-contacto" rel="contacto">Contacto<span class="sr-only">(Contacto)</span></a></li>
          {if ($session==true) && ($privilegios == administrador)}<li><a class="bg-primary" href="#" id="js-adminUsers" rel="login">Administrar Usuarios<span class="sr-only">(Administrar Usuarios)</span></a></li>{/if}
          {if ($session==false)}<li><a class="bg-primary" href="#" id="js-login" rel="login">Login<span class="sr-only">(Login)</span></a></li><li><a class="bg-primary" href="#" id="js-registrar" rel="registrar">Registrar<span class="sr-only">(Registrar)</span></a></li>{/if}
          {if ($session==true)}<li><form method="POST" action="index.php?action=logout"><button class="bg-primary" type="submit">Cerrar Sesión</button></form></li>{/if}


        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <article class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <article id="js-pisar">

        </article>

      </div>
    </div>
  </article>

{include file="footer.tpl" }
