<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion Escolar | UTC</title>
        <link rel="stylesheet" href="css/login.css">
    </head>

<body>

<div class="container">
<h1>Universidad Tres Culturas</h1>
     <div class="contact-form">
   <div class="profile-pic">
   <img src="images/1.png" alt="User Icon"/>
   </div>  
   <div class="signin">
     <form role="form" class="form-horizontal" role="form" method="post" action="{{ url('usralumno') }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
        <input type="text" class="user" value="Matricula" name="usrname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Matricula';}" required=""/>
      <input type="password" class="pass" value="Password" name="psw" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required/>
      {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
              @if(Session::has('mensaje_error'))
                 {{ Session::get('mensaje_error') }}
              @endif
   </div><input type="submit" value="Iniciar Sesión" /></div>
     </form>
</div>
<div class="footer">
     <p>Copyright &copy; 2017 Universidad Tres Culturas | <a href="http://www.utc.mx">UTC</a></p>
</div>

</body>
</html>
