<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col">
            @if(isset($casa) && $casa->imagen()->exists())
            <img src="{{asset('/public/img/houses/' . $casa->imagen->nombre)}}" class="img-fluid-custom">            
            @elseif(isset($espectaculo) && $espectaculo->casa->imagen()->exists())
            <img src="{{asset('/public/img/houses/' . $espectaculo->casa->imagen->nombre)}}" class="img-fluid-custom">            
            @else
            <img src="{{asset('web/img/Tango&FolkloreShow-2.jpg')}}" class="img-fluid-custom">
            @endif
        </div>
    </div>
</div>