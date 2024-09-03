@extends('web.layout.default')
@section('styles')
<link rel="stylesheet" href="{{asset('/web/css/tempusdominus-bootstrap-4.min.css')}}">
@endsection
@section('title', __($espectaculo->nombre))
@section('content')
@include('web.layout.partials.nav')
@include('web.layout.partials.header')
<section class="section-shows pb-4">
    <div class="container-fluid">
        <!--        <div class="row">
                    <div class="col">
                        <h3 class="text-center p-4 bold">@lang($espectaculo->nombre)</h3>
                    </div>
                </div>-->
        <div class="row no-gutters">
            <div class="col">
                <div style="position: absolute; left: 50%; top: -50px; margin-left: -60px;">
                    <img class="img-fluid img-logo-circle" src="{{asset('/public/img/logo/' . $espectaculo->casa->logo)}}">
                </div>
                <h3 class="text-center p-3 bold"><span style="visibility: hidden">@lang($espectaculo->nombre)</span>
                    @if($espectaculo->casa->rating)
                    <br><br>
                    {!! $espectaculo->casa->renderStars($espectaculo->casa->rating)!!}
                    @endif
                </h3>
                <h3 class="text-center p-4 bold">@lang($espectaculo->nombre)</h3>
                <div class="alert alert-warning done-response d-none mt-4 mx-auto clearfix" role="alert">
                    <i class="fas fa-check-square"></i> <span class="done-message"></span>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-custom-color done-pdf float-right"><i class="fas fa-file-pdf"></i> @lang('DOWNLOAD VOUCHER')</a>
                    </div>
                </div>
                <div class="alert alert-danger d-none fail-response mt-4 mx-auto" role="alert">
                    <i class="fas fa-times-circle"></i> <span class="fail-message"></span>
                </div>
            </div>
        </div>
        <div class="row remove-done">
            <div class="col-md-6">
                <div class="position-relative">
                    <img class="img-fluid-custom img-rounded" src="{{asset('/public/img/shows/' . $espectaculo->imagen->nombre)}}">
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
                </div>
            </div>
            <div class="col-md-6">
                {!! nl2br($espectaculo->descripcion, false) !!}
                <hr>
                <ul class="list-unstyled">
                    <li><i class="fas fa-store-alt fa-fw"></i> @lang('TANGO HOUSE'): {{$espectaculo->casa->nombre}}</li>
                    <li><i class="fas fa-calendar-alt fa-fw"></i> @lang('DATE'): {{ $espectaculo->fecha_especial ? $espectaculo->fecha_especial->format('d/m/Y') : __('EVERY DAY') }}</li>
                    @if($espectaculo->horario_cena && $espectaculo->horario)
                    <li><i class="fas fa-utensils fa-fw"></i> @lang('DINNER'): {{ $espectaculo->horario_cena ?  $espectaculo->horario_cena . ' ' . __('HOURS') : '- - -' }}</li>
                    <li><i class="fas fa-star fa-fw"></i> @lang('SHOW'): {{$espectaculo->horario}} @lang('HOURS')</li>
                    @else
                    <li><i class="fas fa-star fa-fw"></i> @lang('SHOW'): @lang('TIME TO BE ARRANGED')</li>
                    @endif
                </ul>
                <div class="">
                    @if($espectaculo->descuento)
                    <div class="d-inline-block mr-3">
                        <div class="price old">{{$espectaculo->moneda->codigo}} {{$espectaculo->precio}}</div>
                        <div class="per-person old">@lang('PER PERSON')</div>
                    </div>
                    @endif
                    <div class="d-inline-block">
                        <div class="price">{{$espectaculo->moneda->codigo}} {{$espectaculo->precioConDescuento}}</div>
                        <div class="per-person">@lang('PER PERSON')</div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="remove-done">
        <div class="container remove-done">
            <div class="row">
                <div class="col" id="col-data">
                    <h3 class="text-center p-4 bold"><i class="fas fa-user-check"></i> @lang('BOOK NOW')!</h3>
                    <div class="">
                        <form id="form-book" class="clearfix hide-done">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('NAME')</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('SURNAME')</label>
                                        <input type="text" class="form-control" name="apellido" id="apellido">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('COUNTRY')</label>
                                        <input type="text" class="form-control" name="pais" id="pais">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('EMAIL')</label>
                                        <input type="text" class="form-control" name="email" id="mail">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('WHATSAPP')</label>
                                        <input type="text" class="form-control" name="telefono" id="telefono">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('HOTEL') + @lang('ADDRESS')</label>
                                        <input type="text" class="form-control" name="hotel" id="hotel">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('SHOW DATE')</label>
                                        <input type="text" class="form-control datetimepicker-input" id="fecha" name="fecha" data-toggle="datetimepicker" data-target="#fecha">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('NUMBER OF PEOPLE')</label>
                                        <select class="form-control" name="cantidad" id="cantidad">
                                            @for($i=1; $i<=30; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                @if($espectaculo->casa->recorridosActivos()->exists())
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('TRANSFER TYPE')</label>
                                        <select class="form-control" name="traslado" id="traslado">
                                            <option value="0|NO">@lang('NO ADD TRANSFER')</option>
                                            @foreach($espectaculo->casa->recorridosActivos as $recorrido)
                                            <?php
                                            $option = __($recorrido->zona->denominacion) . ' | '
                                                    . __($recorrido->traslado->denominacion) . ' | '
                                                    . __($recorrido->tipo->denominacion) . ' | '
                                                    . ' USD ' . $recorrido->precio;
                                            ?>
                                            <option value="{{$recorrido->precio}}|{{$recorrido->traslado->id == 1 ? 'BUS' : 'CAR'}}"><?= trim($option)?></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <input type="hidden" name="precio_traslado" id="input_precio_traslado" value="0.00">
                            <input type="hidden" name="total_traslado" id="input_total_traslado" value="0.00">
                            <input type="hidden" name="precio_show" id="input_precio_show" value="{{$espectaculo->precioConDescuento}}">
                            <input type="hidden" name="total_show" id="input_total_show" value="{{$espectaculo->precioConDescuento}}">
                            <input type="hidden" name="total" id="input_total" value="{{$espectaculo->precioConDescuento}}">
                            <button type="submit" class="btn btn-custom-color float-right" >@lang('NEXT')</button>
                        </form>
                    </div>
                </div>
                <div class="col d-none" id="col-summary">
                    <h3 class="text-center p-4 bold"><i class="fas fa-user-check"></i> @lang('BOOK NOW')!
                        <button type="submit" class="btn btn-custom-color ml-4" id="btn-back">@lang('EDIT')</button>
                    </h3>
                    <div class="box-white p-4 mx-auto" style="max-width: 750px;">
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped table-borderless mb-0">
                                        <tr>
                                            <td><i class="fas fa-user fa-fw"></i> @lang('NAME'):</td>
                                            <td><span id="summary-nombre"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-user fa-fw"></i> @lang('SURNAME'):</td>
                                            <td><span id="summary-apellido"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-flag fa-fw"></i> @lang('COUNTRY'):</td>
                                            <td><span id="summary-pais"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-envelope fa-fw"></i> @lang('EMAIL'):</td>
                                            <td><span id="summary-email"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-mobile fa-fw"></i> @lang('WHATSAPP'):</td>
                                            <td><span id="summary-telefono"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-building fa-fw"></i> @lang('HOTEL') + @lang('ADDRESS'):</td>
                                            <td><span id="summary-hotel"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-calendar-alt fa-fw"></i> @lang('SHOW DATE'):</td>
                                            <td><span id="summary-fecha"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-users fa-fw"></i> @lang('NUMBER OF PEOPLE'):</td>
                                            <td class="font-weight-bold"><span id="summary-cantidad"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-users fa-fw"></i> @lang('TRANSFER TYPE'):</td>
                                            <td><span id="summary-tipo-traslado"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-users fa-fw"></i> @lang('TRANSFER') (@lang('PER PERSON')):</td>
                                            <td>USD <span id="summary-precio-traslado"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-money-bill-alt fa-fw"></i> @lang('SUBTOTAL') @lang('TRANSFER'):</td>
                                            <td class="font-weight-bold">USD <span id="summary-total-traslado"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-money-bill-alt fa-fw"></i> @lang('SHOW') (@lang('PER PERSON')):</td>
                                            <td>USD <span id="summary-precio-show"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-money-bill-alt fa-fw"></i> @lang('SUBTOTAL') @lang('SHOW'):</td>
                                            <td class="font-weight-bold">USD <span id="summary-total-show"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-money-check-alt fa-fw"></i> @lang('TOTAL'):</td>
                                            <td class="font-weight-bold">USD <span id="summary-total"></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <br>
                    <div id="paypal-button-container" class="text-center"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.layout.partials.alerts.error')
@include('web.layout.partials.alerts.success')
@include('web.layout.partials.suscribe')
@include('web.layout.partials.bannerfoot')
@include('web.layout.partials.footer')
@include('web.layout.partials.copy')
@endsection
@section('scripts')
@include('web.page.show_scripts')
@endsection