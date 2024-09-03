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
                            <td align="center" bgcolor="#fff" style="padding: 40px 0 30px 0; color: #1F0600; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                <img src="{{asset('web/img/FT-show-logo-black.png')}}" width="300" height="108" style="display: block;" />
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="color: #1F0600; font-family: Arial, sans-serif; font-size: 24px;">
                                            <b>@lang('CONTACT FORM')</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 20px 0 30px 0; color: #1F0600; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                            @lang('AN UNFORGETTABLE EXPERIENCE').
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td width="260" valign="top">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td style="padding: 25px 0 0 0; color: #1F0600; font-family: Arial, sans-serif; font-size: 15px; line-height: 18px;">
                                                                    @lang('NAME'): {{request()->nombre}}<br />
                                                                    @lang('SURNAME'): {{request()->apellido}}<br />
                                                                    @lang('EMAIL'): {{request()->email}}<br />
                                                                    @lang('WHATSAPP'): {{request()->telefono}}
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td style="font-size: 0; line-height: 0;" width="20">
                                                        &nbsp;
                                                    </td>
                                                    <td width="260" valign="top">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td style="padding: 25px 0 0 0; color: #1F0600; font-family: Arial, sans-serif; font-size: 15px; line-height: 18px;">
                                                                    @lang('MESSAGE'):<br />
                                                                    {{request()->mensaje}}
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
                            <td bgcolor="#eee" style="padding: 30px 30px 30px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td style="color: #666; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                            &reg; TANGO AND FOLKLORE<br/>
                                             CABA BS AS ARGENTINA
                                        </td>
                                        <td align="right" width="25%">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                        <a href="http://www.twitter.com/" style="color: #ffffff;">
                                                            <img src="images/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                                        </a>
                                                    </td>
                                                    <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                                    <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                                        <a href="http://www.twitter.com/" style="color: #ffffff;">
                                                            <img src="images/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                                        </a>
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