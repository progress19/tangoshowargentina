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
                        <a href="" target="_blank" class="btn btn-custom-color done-pdf float-right"><i class="fas fa-file-pdf"></i> @lang('DOWNLOAD VOUCHER')</a>
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
                    <li><i class="fas fa-utensils fa-fw"></i> @lang('DINNER'): {{ $espectaculo->horario_cena ?  $espectaculo->horario_cena . ' ' . __('HOURS') : '- - -' }}</li>
                    <li><i class="fas fa-star fa-fw"></i> @lang('SHOW'): {{$espectaculo->horario}} @lang('HOURS')</li>
                    <li><i class="fas fa-clock fa-fw"></i> @lang('TIME'): {{$espectaculo->duracion}} @lang('MINUTES')</li>
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
                                        <label>@lang('HOTEL')</label>
                                        <input type="text" class="form-control" name="hotel" id="hotel">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('EVENT DATE')</label>
                                        <input type="text" class="form-control datetimepicker-input" id="fecha" name="fecha" data-toggle="datetimepicker" data-target="#fecha">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>@lang('NUMBER OF GUESTS')</label>
                                        <select class="form-control" name="cantidad" id="cantidad">
                                            @for($i=1; $i<=30; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="precio" id="precio" value="{{$espectaculo->precioConDescuento}}">
                            <input type="hidden" name="total" id="total" value="{{$espectaculo->precioConDescuento}}">
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
                                            <td><i class="fas fa-building fa-fw"></i> @lang('HOTEL'):</td>
                                            <td><span id="summary-hotel"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-calendar-alt fa-fw"></i> @lang('EVENT DATE'):</td>
                                            <td><span id="summary-fecha"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-users fa-fw"></i> @lang('NUMBER OF GUESTS'):</td>
                                            <td><span id="summary-cantidad"></span></td>
                                        </tr>
                                        <tr>
                                            <td><i class="fas fa-money-bill-alt fa-fw"></i> @lang('PER PERSON'):</td>
                                            <td>USD <span id="summary-precio"></span></td>
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
<script src="https://www.paypal.com/sdk/js?client-id=Ac3PPcvSIeTdNRYFaBkPh4b21UD0c89OQUzUyyWKrXoc4yRmYk20pKzKdJ3trnFAMLY-na_KxEK2ecMg"></script>
<script src="{{asset('/web/js/moment.js')}}"></script>
<script src="{{asset('/web/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('/web/js/jquery.validate.min.js')}}"></script>
<script>


var el_nombre = $('#nombre');
var el_apellido = $('#apellido');
var el_pais = $('#pais');
var el_email = $('#mail');
var el_telefono = $('#telefono');
var el_hotel = $('#hotel');
var el_fecha = $('#fecha');
var el_cantidad = $('#cantidad');
var el_precio = $('#precio');
var el_total = $('#total');
var el_summary_nombre = $('#summary-nombre');
var el_summary_apellido = $('#summary-apellido');
var el_summary_pais = $('#summary-pais');
var el_summary_email = $('#summary-email');
var el_summary_telefono = $('#summary-telefono');
var el_summary_hotel = $('#summary-hotel');
var el_summary_fecha = $('#summary-fecha');
var el_summary_cantidad = $('#summary-cantidad');
el_summary_cantidad.text('1');
var el_summary_precio = $('#summary-precio');
el_summary_precio.text('<?= $espectaculo->precioConDescuento?>');
var el_summary_total = $('#summary-total');
el_summary_total.text('<?= $espectaculo->precioConDescuento?>');
var precio_unitario = <?= $espectaculo->precioConDescuento?>;
var total = <?= $espectaculo->precioConDescuento?>;
var el_form_book = $('#form-book');
var el_col_data = $('#col-data');
var el_col_summary = $('#col-summary');
var el_btn_back = $('#btn-back');
var el_done_response = $('.done-response');
var el_fail_response = $('.fail-response');
var el_done_message = $('.done-message');
var el_done_pdf = $('.done-pdf');
var el_fail_message = $('.fail-message');


el_nombre.on('keyup', function ()
{
    el_summary_nombre.text(el_nombre.val());
});
el_apellido.on('keyup', function ()
{
    el_summary_apellido.text(el_apellido.val());
});
el_pais.on('keyup', function ()
{
    el_summary_pais.text(el_pais.val());
});
el_email.on('keyup', function ()
{
    el_summary_email.text(el_email.val());
});
el_telefono.on('keyup', function ()
{
    el_summary_telefono.text(el_telefono.val());
});
el_hotel.on('keyup', function ()
{
    el_summary_hotel.text(el_hotel.val());
});
el_fecha.datetimepicker({
    format: 'DD/MM/YYYY',
    minDate: moment().add(1,'days'),
    disabledDates: [
        moment("2020-12-25"),
    ]
});
el_fecha.on('change.datetimepicker', function ()
{
    el_summary_fecha.text(el_fecha.val());
});
//el_fecha.trigger('change.datetimepicker');
el_cantidad.on('change', function ()
{
    total = (precio_unitario * el_cantidad.val()).toFixed(2);
    el_summary_cantidad.text(el_cantidad.val());
    el_summary_total.text(total);
    el_total.val(total);
});


$(function ()
{
    $("#form-book").validate({
        rules: {
            nombre: "required",
            apellido: "required",
            pais: "required",
            telefono: "required",
            hotel: "required",
            fecha: "required",
            email: {
                required: true,
                email: true
            },
        },
        submitHandler: function (form)
        {
            el_col_data.addClass('d-none');
            el_col_summary.removeClass('d-none');
        }
    });
    el_btn_back.on('click', function ()
    {
        el_col_data.removeClass('d-none');
        el_col_summary.addClass('d-none');
    });
});




paypal.Buttons({
    createOrder: function (data, actions)
    {
        return actions.order.create({
            application_context: {
                brand_name: '<?= 'TANGO AND FOLKLORE - ' . __($espectaculo->casa->nombre)?>',
                user_action: 'PAY_NOW',
                shipping_preference: 'NO_SHIPPING',
            },
            purchase_units: [{
                    reference_id: '<?= $espectaculo->identity?>',
                    description: '<?= $espectaculo->nombre?>',
                    amount: {
                        currency: 'USD',
                        value: total,
                    },
                }],
        });
    },
    onApprove: function (data, actions)
    {
        return actions.order.capture().then(function (details)
        {
            objResponse = {
                orderId: data.orderID,
                id: details.id,
                orderStatus: details.status,
                payerId: details.payer.payer_id,
                payerEmail: details.payer.email_address,
                payerCountry: details.payer.address.country_code,
                payerName: details.payer.name.given_name + ' ' + details.payer.name.surname,
                paymentAmount: details.purchase_units[0].payments.captures[0].amount.currency_code + ' ' + details.purchase_units[0].payments.captures[0].amount.value,
                paymentReference: details.purchase_units[0].reference_id,
            };
            objForm = el_form_book.serializeArray().reduce(function (m, o)
            {
                m[o.name] = o.value;
                return m;
            }, {});
            var jsonObject = $.extend({}, objResponse, objForm);
            if (details.status == 'COMPLETED')
            {
                var request = $.ajax({
                    url: '<?= route('web.page.paypal.capture')?>',
                    type: "POST",
                    data: $.param(jsonObject)
                });
                request.done(function (data)
                {
                    $('.remove-done').remove();
                    el_done_response.removeClass('d-none');
                    el_done_message.text(data.message);
                    el_done_pdf.attr('href', data.pdf_url);
                    el_fail_response.addClass('d-none');
                });
                request.fail(function (jqXHR)
                {
                    $('.remove-done').remove();
                    el_done_response.addClass('d-none');
                    el_fail_response.removeClass('d-none');
                    el_fail_message.text(jqXHR.responseJSON.message);
                });
            }
            else
            {
                // INTENTO PERO NO PASO EN PAYPAL
//                alert('PAGO NO CAPTURADO');
                el_done_response.addClass('d-none');
                el_fail_response.removeClass('d-none');
                el_fail_message.text('PAYPAL CANNOT PROCESS YOUR REQUEST');
            }
        });
    },
    onCancel: function (data)
    {
        // NO INTENTO
//        alert('PAGO CANCELADO');
        el_done_response.addClass('d-none');
        el_fail_response.removeClass('d-none');
        el_fail_message.text('PAYMENT FLOW CANCELLED');
    }
}).render('#paypal-button-container');
function status(res)
{
    if (!res.ok)
    {
        throw new Error(res.statusText);
    }
    return res;
}
</script>
@endsection