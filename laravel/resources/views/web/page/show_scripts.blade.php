<!--<script src="https://www.paypal.com/sdk/js?client-id=Ac3PPcvSIeTdNRYFaBkPh4b21UD0c89OQUzUyyWKrXoc4yRmYk20pKzKdJ3trnFAMLY-na_KxEK2ecMg"></script>-->
<script src="https://www.paypal.com/sdk/js?client-id=AUFQXwIe-rReUB5L7fOQbj2njArW5AglzDRpqRU1bAWrIWHxgUiURzagMPH_dRuyyZ-8xIuI40UOdCTH"></script>
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
el_fecha.val('<?= \Carbon\Carbon::now()->addDays(1)->format('d/m/Y') ?>');
var el_cantidad = $('#cantidad');
var el_traslado = $('#traslado');
var el_summary_nombre = $('#summary-nombre');
var el_summary_apellido = $('#summary-apellido');
var el_summary_pais = $('#summary-pais');
var el_summary_email = $('#summary-email');
var el_summary_telefono = $('#summary-telefono');
var el_summary_hotel = $('#summary-hotel');
var el_summary_fecha = $('#summary-fecha');
el_summary_fecha.text('<?= \Carbon\Carbon::now()->addDays(1)->format('d/m/Y') ?>');
var el_summary_cantidad = $('#summary-cantidad');
var el_summary_tipo_traslado = $('#summary-tipo-traslado');
var el_summary_precio_traslado = $('#summary-precio-traslado');
var el_summary_precio_show = $('#summary-precio-show');
var el_summary_total_traslado = $('#summary-total-traslado');
var el_summary_total_show = $('#summary-total-show');
var el_summary_total = $('#summary-total');
var el_input_precio_traslado = $('#input_precio_traslado');
var el_input_precio_show = $('#input_precio_show');
var el_input_total_traslado = $('#input_total_traslado');
var el_input_total_show = $('#input_total_show');
var el_input_total = $('#input_total');
var precio_show = <?= $espectaculo->precioConDescuento?>;
var precio_traslado = 0.00;
var total_show = 0.00;
var total_traslado = 0.00;
var total = 0.00;
var texto_traslado = '';
var texto_show = '';
var aux_texto_show = '<?= $espectaculo->nombre?>';
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
    minDate: moment().add(1, 'days'),
    disabledDates: [
        moment("2020-12-25"),
    ]
});
el_fecha.on('change.datetimepicker', function ()
{
    el_summary_fecha.text(el_fecha.val());
});
el_cantidad.on('change', function ()
{
    var explode = el_traslado.val().split('|');
    var tipo_traslado;
    precio_traslado = parseFloat(explode[0]);
    if (explode[1] === 'NO')
    {
        tipo_traslado = '<?= __('NO TRANSFER')?>';
        total_traslado = precio_traslado * el_cantidad.val();
    }
    else if (explode[1] === 'BUS')
    {
        tipo_traslado = '<?= __('BUS')?>';
        for (var i = 1; i <= 30; i++)
        {
            if (el_cantidad.val() == i)
            {
                if (i % 4 === 1)
                {
                    total_traslado = precio_traslado * (1 + parseInt(el_cantidad.val()));
                }
                else
                {
                    total_traslado = precio_traslado * el_cantidad.val();
                }
                break;
            }
        }
    }
    else //es auto
    {
        tipo_traslado = '<?= __('CAR')?>';
        for (var i = 1; i <= 30; i++)
        {
            if (el_cantidad.val() == i)
            {
                if (i % 4 === 1)
                {
                    total_traslado = precio_traslado * (1 + parseInt(el_cantidad.val()));
                }
                else
                {
                    total_traslado = precio_traslado * el_cantidad.val();
                }
                break;
            }
        }
    }
    var explode_texto = $("#traslado option:selected").text().split('|');
    texto_traslado = '';
    if (explode_texto[1] && explode_texto[2])
    {
        texto_traslado = explode_texto[0] + ' - ' + tipo_traslado + ' - ' + explode_texto[2] + ' | ' + el_cantidad.val() + ' PEOPLE';
    }
    else
    {
        texto_traslado = tipo_traslado;
    }
    texto_show = aux_texto_show;
    texto_show += ' | ' + el_cantidad.val() + ' PEOPLE';
    el_summary_cantidad.text(el_cantidad.val());
    el_summary_tipo_traslado.text(tipo_traslado);
    el_summary_precio_traslado.text(precio_traslado.toFixed(2));
    el_summary_precio_show.text(precio_show.toFixed(2));
    el_summary_total_traslado.text(total_traslado.toFixed(2));
    total_show = precio_show * el_cantidad.val();
    el_summary_total_show.text(total_show.toFixed(2));
    total = total_show + total_traslado;
    el_summary_total.text(total.toFixed(2));
    el_input_precio_traslado.val(precio_traslado.toFixed(2));
    el_input_total_traslado.val(total_traslado.toFixed(2));
    el_input_precio_show.val(precio_show.toFixed(2));
    el_input_total_show.val(total_show.toFixed(2));
    el_input_total.val(total.toFixed(2));
});
el_traslado.on('change', function ()
{
    var explode = el_traslado.val().split('|');
    var tipo_traslado;
    precio_traslado = parseFloat(explode[0]);
    if (explode[1] === 'NO')
    {
        tipo_traslado = '<?= __('NO TRANSFER')?>';
        total_traslado = precio_traslado * el_cantidad.val();
    }
    else if (explode[1] === 'BUS')
    {
        tipo_traslado = '<?= __('BUS')?>';
        for (var i = 1; i <= 30; i++)
        {
            if (el_cantidad.val() == i)
            {
                if (i % 4 === 1)
                {
                    total_traslado = precio_traslado * (1 + parseInt(el_cantidad.val()));
                }
                else
                {
                    total_traslado = precio_traslado * el_cantidad.val();
                }
                break;
            }
        }
    }
    else //es auto
    {
        tipo_traslado = '<?= __('CAR')?>';
        for (var i = 1; i <= 30; i++)
        {
            if (el_cantidad.val() == i)
            {
                if (i % 4 === 1)
                {
                    total_traslado = precio_traslado * (1 + parseInt(el_cantidad.val()));
                }
                else
                {
                    total_traslado = precio_traslado * el_cantidad.val();
                }
                break;
            }
        }
    }
    var explode_texto = $("#traslado option:selected").text().split('|');
    texto_traslado = '';
    if (explode_texto[1] && explode_texto[2])
    {
        texto_traslado = explode_texto[0] + ' - ' + tipo_traslado + ' - ' + explode_texto[2] + ' | ' + el_cantidad.val() + ' PEOPLE';
    }
    else
    {
        texto_traslado = tipo_traslado;
    }
    texto_show = aux_texto_show;
    texto_show += ' | ' + el_cantidad.val() + ' PEOPLE';
    el_summary_cantidad.text(el_cantidad.val());
    el_summary_tipo_traslado.text(tipo_traslado);
    el_summary_precio_traslado.text(precio_traslado.toFixed(2));
    el_summary_precio_show.text(precio_show.toFixed(2));
    el_summary_total_traslado.text(total_traslado.toFixed(2));
    total_show = precio_show * el_cantidad.val();
    el_summary_total_show.text(total_show.toFixed(2));
    total = total_show + total_traslado;
    el_summary_total.text(total.toFixed(2));
    el_input_precio_traslado.val(precio_traslado.toFixed(2));
    el_input_total_traslado.val(total_traslado.toFixed(2));
    el_input_precio_show.val(precio_show.toFixed(2));
    el_input_total_show.val(total_show.toFixed(2));
    el_input_total.val(total.toFixed(2));
});
$(function ()
{
    el_cantidad.trigger('change');
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
                        breakdown: {
                            item_total: {
                                currency_code: 'USD',
                                value: total
                            },
                        }
                    },
                    items: [
                        {
                            unit_amount: {
                                currency_code: 'USD',
                                value: total_show
                            },
                            quantity: '1',
                            name: "<?= __('SHOW')?>",
                            description: texto_show
                        },
                        {
                            unit_amount: {
                                currency_code: "USD",
                                value: total_traslado
                            },
                            quantity: '1',
                            name: '<?= __('TRANSFER')?>',
                            description: texto_traslado
                        },
                    ],
                }],
        });
    },
    onApprove: function (data, actions)
    {
        return actions.order.capture().then(function (details)
        {
            console.log(details);
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
                paymentTripType: details.purchase_units[0].items[1].description,
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