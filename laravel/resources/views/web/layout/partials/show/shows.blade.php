<section class="section-shows pb-4">
    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col">
                <h3 class="text-center px-4 pt-4 bold">@lang('TANGO AND FOLKLORE SHOWS IN BUENOS AIRES')</h3>
                <div class="suscribe pb-4 text-center">@lang('SAVE MONEY AND TIME, BOOK YOUR PLACE AND GET YOUR VOUCHER NOW')</div>
            </div>
        </div>
        @if($espectaculos)
        @foreach($espectaculos->chunk(4) as $items)
        <div class="row">
            @foreach($items as $espectaculo)
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="card card-borders h-100">
                    @if($espectaculo->imagen()->exists())
                    <img class="card-img-top card-borders lozad" data-src="{{asset('/public/img/shows/' . $espectaculo->imagen->nombre)}}">
                    @endif
                    <div class="card-body position-relative">
                        <h5 class="card-title text-center bold mb-1">
                            {{$espectaculo->casa->nombre}}<br>
                            @if($espectaculo->casa->rating)
                            {!! $espectaculo->casa->renderStars($espectaculo->casa->rating)!!}
                            <br>
                            @endif
                            <small>{{$espectaculo->nombre}}</small>
                        </h5>
                        <div class="date-info text-center mb-2">{{ $espectaculo->fecha_especial ? $espectaculo->fecha_especial->format('d/m/Y') : __('EVERY DAY') }}</div>
                        <ul class="list-unstyled">
                            @if($espectaculo->horario_cena && $espectaculo->horario)
                            <li><i class="fas fa-utensils fa-fw"></i> @lang('DINNER'): {{ $espectaculo->horario_cena ?  $espectaculo->horario_cena . ' ' . __('HOURS') : '- - -' }}</li>
                            <li><i class="fas fa-star fa-fw"></i> @lang('SHOW'): {{$espectaculo->horario}} @lang('HOURS')</li>
                            @else
                            <li><i class="fas fa-star fa-fw"></i> @lang('SHOW'): @lang('TIME TO BE ARRANGED')</li>
                            @endif
                            <li><i class="fas fa-clock fa-fw"></i> @lang('TIME'): {{$espectaculo->duracion}} @lang('MINUTES')</li>
                        </ul>
                        <img class="img-fluid img-logo-circle-80 position-absolute" src="{{asset('/public/img/logo/' . $espectaculo->casa->logo)}}" style="bottom: 10px; right: 10px;">
                    </div>
                    <div class="card-footer text-right">
                        @if($espectaculo->descuento)
                        <div class="d-inline-block mr-3">
                            <div class="price old"><span style="font-size: 18px">{{$espectaculo->moneda->codigo}}</span> {{$espectaculo->precio}}</div>
                            <div class="per-person old">@lang('PER PERSON')</div>
                        </div>
                        @endif
                        <div class="d-inline-block">
                            <div class="price"><span style="font-size: 18px">{{$espectaculo->moneda->codigo}}</span> {{$espectaculo->precioConDescuento}}</div>
                            <div class="per-person">@lang('PER PERSON')</div>
                        </div>
                    </div>
                    @if($espectaculo->descuento)
                    <div class="discount">
                        <div class="discount-inner">
                            <div class="clipboard" style="-webkit-clip-path: polygon(0 0, 100% 0, 100% 100%);clip-path: polygon(0 0, 100% 0, 100% 100%);">
                                <div class="clipboard-text-bold">{{$espectaculo->descuento}}%</div>
                                <div class="clipboard-text-normal">
                                    OFF
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($espectaculo->servicios()->exists())
                    <div class="position-absolute" style="top:8px; left: 8px; z-index: 2">
                        <ul class="list-inline">
                            @foreach($espectaculo->servicios as $servicio)
                            <li class="list-inline-item li-icon"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="auto" title="{{$servicio->denominacion}}"><i class="fas {{$servicio->icono}} fa-fw"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <a href="{{route('web.page.show', ['show_id' => $espectaculo->identity, 'slug' => $espectaculo->slug])}}" class="stretched-link"></a>
                </div>
            </div>
            @endforeach
        </div>
        @if(!$loop->last)
        <br>
        <br>
        @endif
        @endforeach
        @includeWhen(in_array(Route::currentRouteName(), [
        'web.page.home',
        ]) , 'web.layout.partials.show.btnallshows')
        @else
        @lang('NO DATA')
        @endif
    </div>
</section>