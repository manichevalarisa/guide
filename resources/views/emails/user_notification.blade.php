@extends('layouts.email')
@section('content')
    <div style="background-color:transparent;">
        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:700px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="700" style=";width:700px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:5px;"><![endif]-->
                <div class="col num12" style="min-width: 320px; max-width: 700px; display: table-cell; vertical-align: top; width: 700px;">
                    <div style="width:100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                            <!--<![endif]-->
                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                <tbody>
                                <tr style="vertical-align: top;" valign="top">
                                    <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="5" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 5px; width: 100%;" valign="top" width="100%">
                                            <tbody>
                                            <tr style="vertical-align: top;" valign="top">
                                                <td height="5" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 20px; padding-left: 20px; padding-top: 10px; padding-bottom: 0px; font-family: Tahoma, sans-serif"><![endif]-->
                            <div style="color:#191919;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:20px;padding-bottom:0px;padding-left:20px;">
                                <div style="line-height: 1.5; font-size: 12px; color: #191919; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;">
                                    <p style="font-size: 28px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 42px; margin: 0;"><span style="font-size: 20px; color: #34495e;"><strong> <span>{{ t('Thanks for your request', 1, $lang) }} , {{$name}} ! </span></strong></span></p>
                                </div>
                            </div>
                            <!--[if mso]></td></tr></table><![endif]-->
                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                <tbody>
                                <tr style="vertical-align: top;" valign="top">
                                    <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 5px; padding-right: 5px; padding-bottom: 5px; padding-left: 5px;" valign="top">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 2px solid #FFD3E0; width: 15%;" valign="top" width="15%">
                                            <tbody>
                                            <tr style="vertical-align: top;" valign="top">
                                                <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                <tbody>
                                <tr style="vertical-align: top;" valign="top">
                                    <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;" valign="top">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 2px solid #FFD3E0; width: 5%;" valign="top" width="5%">
                                            <tbody>
                                            <tr style="vertical-align: top;" valign="top">
                                                <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                    </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
        </div>
    </div>

    <div style="background-color:transparent;">
        <div class="block-grid mixed-two-up" style="Margin: 0 auto; min-width: 320px; max-width: 700px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:700px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
                <!--[if (mso)|(IE)]><td align="center" width="466" style=";width:466px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num8" style="display: table-cell; vertical-align: top; min-width: 320px; max-width: 464px; width: 466px;">
                    <div style="width:100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                            <!--<![endif]-->
                            <div class="mobile_hide">
                                <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
                                    <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                        <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 15px;" valign="top">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" class="divider_content" height="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 5px solid transparent; height: 0px; width: 15%;" valign="top" width="15%">
                                                <tbody>
                                                <tr style="vertical-align: top;" valign="top">
                                                    <td height="0" style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 40px; padding-top: 0px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                            <div style="color:#34495e;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:2;padding-top:0px;padding-right:10px;padding-bottom:10px;padding-left:40px;">
                                <div style="line-height: 2; font-size: 12px; color: #34495e; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 24px;">
                                    <p style="font-size: 20px; line-height: 2; word-break: break-word; text-align: left; mso-line-height-alt: 40px; margin: 0;"><span style="font-size: 20px;"><strong><span style="">{{ t('Request Data', 1, $lang) }}</span></strong></span></p>
                                </div>
                            </div>
                            <!--[if mso]></td></tr></table><![endif]-->
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 30px; padding-left: 40px; padding-top: 0px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                            <div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:2;padding-top:0px;padding-right:30px;padding-bottom:10px;padding-left:40px;">
                                <div style="line-height: 2; font-size: 12px; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 24px;">
                                    <p style="font-size: 14px; line-height: 2; word-break: break-word; text-align: left; mso-line-height-alt: 28px; margin: 0;">
                                        <b>{{ t('Name', 1, $lang) }} :</b> {{ $name }} <br>
                                        <b>{{ t('Email', 1, $lang) }} :</b> {{ $email }} <br>
                                       <b> {{ t('Message', 1, $lang) }} : </b> <br>
                                        {{$userMessage}}
                                    </p>
                                </div>
                            </div>
                            <!--[if mso]></td></tr></table><![endif]-->
                            <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                    </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td><td align="center" width="233" style=";width:233px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
                <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 232px; width: 233px;">
                    <div style="width:100% !important;">
                        <!--[if (!mso)&(!IE)]><!-->
                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                            <!--<![endif]-->
                            <div align="center" class="img-container center fixedwidth" style="padding-right: 40px;padding-left: 0px;">
                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 40px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="I'm an image" border="0" class="center fixedwidth" src="https://media-public.canva.com/MftAM/MADyGdMftAM/2/tl.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 193px; display: block;" title="I'm an image" width="193"/>
                                <!--[if mso]></td></tr></table><![endif]-->
                            </div>
                            <!--[if (!mso)&(!IE)]><!-->
                        </div>
                        <!--<![endif]-->
                    </div>
                </div>
                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
            </div>
        </div>
    </div>
@endsection
