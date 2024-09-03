<section class="section-houses pb-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3 class="text-center px-4 pt-4 bold">@lang('BEST ARGENTINE TANGO HOUSES IN ONE MARKETPLACE')</h3>
                <div class="suscribe pb-4 text-center">@lang('SAVE MONEY AND TIME, WE HAVE THE BEST RATES. BOOK NOW')</div>
            </div>
        </div>
        @if(Route::currentRouteName() === 'web.page.home')
        @php
        $casas = $casas->where('destacado', true);
        @endphp
        @endif
        @if($casas)
        @foreach($casas as $casa)
        <div class="row">
            <div class="col-md-6">
                <div class="h-100">
                    @if($casa->imagen()->exists())
                    <div class="position-relative">
                        <img class="img-fluid-custom img-rounded lozad" data-src="{{asset('/public/img/houses/' . $casa->imagen->nombre)}}">
                        @if($casa->logo)
                        <div style="position: absolute; left: 20px; top: 20px;" class="d-none d-md-block">
                            <img class="img-fluid img-logo-circle" src="{{asset('/public/img/logo/' . $casa->logo)}}">
                        </div>
                        @endif
                    </div>
                    @else
                    @lang('NO IMAGES')
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="position-relative h-100">
                    <!--<div class="h-100">-->
                    <h3 class="mb-2">{{$casa->nombre}}
                        @if($casa->rating)
                        {!! $casa->renderStars($casa->rating)!!}
                        @endif
                    </h3>
                    {!! nl2br($casa->descripcion, false) !!}
                    @if($casa->espectaculo()->exists())
                    <div class="box-brown mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                @if($casa->espectaculo->first()->descuento)
                                <div class="d-inline-block mr-3">
                                    <div class="per-person old">@lang('FROM')</div>
                                    <div class="price old"><span style="font-size: 18px">{{$casa->espectaculo->first()->moneda->codigo}}</span> {{$casa->espectaculo->first()->precio}}</div>
                                    <div class="per-person old">@lang('PER PERSON')</div>
                                </div>
                                @endif
                                <div class="d-inline-block">
                                    <div class="per-person">@lang('FROM')</div>
                                    <div class="price"><span style="font-size: 18px">{{$casa->espectaculo->first()->moneda->codigo}}</span> {{$casa->espectaculo->first()->precioConDescuento}}</div>
                                    <div class="per-person">@lang('PER PERSON')</div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                @if($casa->imagenesActivas()->exists())
                                <a href="{{asset('/public/img/houses/' . $casa->imagen->nombre)}}" data-toggle="lightbox" data-gallery="gallery-{{$casa->identity}}" class="btn btn-custom-color btn-round mt-1">@lang('GALLERY')</a>
                                @endif
                                <a href="{{route('web.page.house', ['casa_id' => $casa->identity, 'slug' => $casa->slug])}}" class="btn btn-custom-color btn-round mt-1">@lang('ALL SHOWS')</a>
                            </div>
                        </div>
                    </div>
                    @if($casa->imagenesActivas()->exists())
                    @foreach($casa->imagenesActivas as $imagen)
                    <div data-toggle="lightbox" data-gallery="gallery-{{$casa->identity}}" data-remote="{{asset('/public/img/houses/' . $imagen->nombre)}}" data-title=""></div>
                    @endforeach
                    @endif
                    @endif
                    <!--</div>-->
                </div>
            </div>
        </div>
        @if(!$loop->last)
        <hr>
        @endif
        @endforeach
        @includeWhen(in_array(Route::currentRouteName(), [
        'web.page.home',
        ]) , 'web.layout.partials.house.btnallhouses')
        @else
        @lang('NO DATA')
        @endif
    </div>
</section>