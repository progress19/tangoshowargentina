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
                <td style="padding: 10px 0 30px 0;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #ddd; border-collapse: collapse;">
                        <tr>
                            <td align="center" bgcolor="#fff" style="padding: 40px 0 0 0;">
                                <img src="{{asset('web/img/FT-show-logo-black.png')}}" width="300" height="108" style="display: block;" />
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="color: #1F0600; font-family: Arial, sans-serif; font-size: 16px;">
                                            <b>@lang('CONTACT FORM')</b>
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
                                                                    @lang('FULLNAME'): {{request()->nombre}}<br />
                                                                    @lang('COUNTRY'): {{request()->pais}}<br />
                                                                    @lang('EMAIL'): {{request()->email}}<br />
                                                                    @lang('WHATSAPP'): {{request()->telefono}}<br />
                                                                    @lang('MESSAGE'):<br />
                                                                    {!!nl2br(request()->mensaje)!!}
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
                            <td bgcolor="#fff" style="padding: 0 30px 30px 30px;">
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