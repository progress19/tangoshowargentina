<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
        <style>
            body{
                color: #1F0600;
            }
            .font-12{
                font-size: 12px;
            }
            .font-14{
                font-size: 14px;
            }
            .font-16{
                font-size: 16px;
            }
            .lh-18{
                line-height: 18px;
            }
        </style>
    </head>
    <body class="font-12">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-center mb-5">
                        <img src="{{asset('web/img/FT-show-logo-black.png')}}" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <b class="font-16">@lang('VOUCHER') {{$orden->id}}</b><br><br>
                        <span class="font-14 lh-18">
                            <b>{{$orden->espectaculo->casa->nombre}}</b><br>
                            {{$orden->espectaculo->nombre}}
                        </span>
                    </div>
                    <ul class="list-unstyled mb-5">
                        <li>@lang('FULLNAME'): {{$orden->nombre . ' ' . $orden->apellido}}</li>
                        <li>@lang('COUNTRY'): {{$orden->pais}}</li>
                        <li>@lang('EMAIL'): {{$orden->email}}</li>
                        <li>@lang('WHATSAPP'): {{$orden->telefono}}</li>
                        <li>@lang('HOTEL') + @lang('ADDRESS'): {{$orden->hotel}}</li>
                        <li>@lang('SHOW DATE'): {{$orden->fecha->format('d/m/Y')}}</li>
                        <li>@lang('SHOW ADDRESS'): {{$orden->espectaculo->casa->direccion}}</li>
                        <li>@lang('NUMBER OF PEOPLE'): {{$orden->cantidad}}</li>
                        <li>@lang('TRANSFER TYPE'): {{$orden->tipo_traslado}}</li>
                        <li>@lang('TRANSFER') (@lang('PER PERSON')): USD {{$orden->precio_traslado}}</li>
                        <li>@lang('SUBTOTAL') @lang('TRANSFER'): USD {{$orden->total_traslado}}</li>
                        <li>@lang('SHOW') (@lang('PER PERSON')): USD {{$orden->precio_show}}</li>
                        <li>@lang('SUBTOTAL') @lang('SHOW'): USD {{$orden->total_show}}</li>
                        <li>@lang('TOTAL'): <b>USD {{$orden->total}}</b></li>
                        <li>@lang('PAYPAL ID'): <b>{{$orden->orderId}}</b></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-center mb-5">
                        <img src="{{asset('web/img/mapa/' . $orden->espectaculo->casa->mapa)}}" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <a href="http://www.facebook.com/">
                            <img src="{{asset('web/img/facebook.png')}}">
                        </a>
                        <a href="http://www.instagram.com/">
                            <img src="{{asset('web/img/instagram.png')}}">
                        </a>
                        <br>
                        booking@tangoandfolklore.com<br>
                        www.tangoandfolklore.com<br>
                        BUENOS AIRES CITY - ARGENTINA
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>