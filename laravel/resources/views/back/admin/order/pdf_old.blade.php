<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>TANGO AND FOLKLORE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">	
            <tr>
                <td style="padding: 10px 0 10px 0;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                        <tr>
                            <td align="center" bgcolor="#fff" style="padding: 40px 0 0 0;">
                                <img src="{{asset('web/img/FT-show-logo-black.png')}}" width="300" height="108" style="display: block;" />
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 0 40px 0;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="color: #1F0600; font-family: Arial, sans-serif; font-size: 16px;">
                                            <b>@lang('VOUCHER') {{$orden->id}}</b><br />
                                            <span style="color: #1F0600; font-family: Arial, sans-serif; font-size: 14px; line-height: 18px;">
                                                <b>{{$orden->espectaculo->casa->nombre}}</b><br />
                                                {{$orden->espectaculo->nombre}}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td valign="top">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td style="padding: 25px 0 0 0; color: #1F0600; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;">
                                                                    @lang('FULLNAME'): {{$orden->nombre . ' ' . $orden->apellido}}<br />
                                                                    @lang('COUNTRY'): {{$orden->pais}}<br />
                                                                    @lang('EMAIL'): {{$orden->email}}<br />
                                                                    @lang('WHATSAPP'): {{$orden->telefono}}<br />
                                                                    @lang('HOTEL'): {{$orden->hotel}}<br />
                                                                    @lang('SHOW DATE'): {{$orden->fecha->format('d/m/Y')}}<br />
                                                                    @lang('SHOW ADDRESS'): {{$orden->espectaculo->casa->direccion}}<br />
                                                                    @lang('NUMBER OF GUESTS'): {{$orden->cantidad}}<br />
                                                                    @lang('TOTAL'): <b>USD {{$orden->total}}</b><br />
                                                                    @lang('PAYPAL ID'): <b>{{$orden->orderId}}</b>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#fff" style="padding: 0 0 30px 0;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                <tr>
                                                    <td align="center">
                                                        <img src="{{asset('web/img/mapa/' . $orden->espectaculo->casa->mapa)}}" alt="mapa" width="560" height="280" border="0" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#fff" style="padding: 0 0 0 0;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                <tr>
                                                    <td style="font-family: Arial, sans-serif; font-size: 12px; line-height: 22px;" align="center">
                                                        <a href="http://www.facebook.com/" style="color: #ffffff; margin: 0 10px 0 0; ">
                                                            <img src="{{asset('web/img/facebook.png')}}" alt="Facebook" width="38" height="38" border="0" />
                                                        </a>
                                                        <a href="http://www.instagram.com/" style="color: #ffffff;">
                                                            <img src="{{asset('web/img/instagram.png')}}" alt="Instagram" width="38" height="38" border="0" />
                                                        </a>
                                                        <br />
                                                        booking@tangoandfolklore.com<br/>
                                                        www.tangoandfolklore.com<br/>
                                                        BUENOS AIRES CITY - ARGENTINA
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>