{!! csrf_field() !!}
<footer> 

    <div class="footer-right">
        <strong>Fecha actual:  </strong> {{$dia1 = date("d")}} / {{$mes1 = date("m")}} / {{ $ano1 = date("Y")}}.
        <p><strong>Fecha de la primera seccion:  </strong>{{Session::get('diainicio')}} / {{Session::get('mesinicio')}} / {{Session::get('anoinicio')}}.</p>
    </div>

    <div class="footer-left">
        <p>&copy; 2017 Copyright: UTC</p>
    </div>

</footer>

