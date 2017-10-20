<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion Escolar | UTC</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

<body>
<div class="container">
  <section id="content">
    <form role="form" class="form-horizontal" role="form" method="post" action="{{ url('usradmin') }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <h1>Gestion | ADMIN </h1>
      <div>
        <input type="text" name="usradmin" placeholder="Usuario" required="" id="username" />
      </div>
      <div>
        <input type="password" name="pswadmin" placeholder="Contraseña" required="" id="password" />
      </div>
      <div>
           <?php
            $ano1 = date("Y"); 
            $mes1 = date("m"); 
            $dia1 = date("d");
            ?>
            <input name="dia1" type="hidden" value=<?php echo $dia1 ?> >
            <input name="mes1" type="hidden" value=<?php echo $mes1 ?> >
            <input name="ano1" type="hidden" value=<?php echo $ano1 ?> >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Iniciar Sesión" />
      </div>
    </form><!-- form -->
    <div class="button">
      <a href="#">Fecha: {{$dia1}}/{{$mes1}}/{{$ano1}}</a>
    </div><!-- button -->
  </section><!-- content -->
</div><!-- container -->
    <script src="js/index.js"></script>
</body>
</html>
