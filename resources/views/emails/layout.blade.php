@php
    $lang = isset($lang) ? $lang : 'eng';
@endphp
<html lang="{{ isset($lang) && $lang == 'ara' ? 'ara' : 'eng' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');
        /* CLIENT-SPECIFIC STYLES ------------------- */

        #outlook a {
            padding: 0;
            /* Force Outlook to provide a "view in browser" message */
        }

        .ReadMsgBody {
            width: 100%;
            /* Force Hotmail to display emails at full width */
        }

        .ExternalClass {
            width: 100%;
            /* Force Hotmail to display emails at full width */
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
            /* Force Hotmail to display normal line spacing */
        }

        body,
        table,
        td,
        a {
            /* Prevent WebKit and Windows mobile changing default text sizes */
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            /* Remove spacing between tables in Outlook 2007 and up */
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            /* Allow smoother rendering of resized image in Internet Explorer */
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES --------------------------- */

        body {
            height: 100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        img {
            border: 0;
            /* height: auto; */
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        /* iOS BLUE LINKS */

        .apple-links a {
            color: #999999;
            text-decoration: none;
        }



        /* MOBILE STYLES ------------------------ */

        @media screen and (max-width: 600px) {

            .card-img {
                flex-basis: 100% !important;
                max-width: 100% !important;
                margin: 10px !important;
            }

        }

        .block {
            padding: 10px;
            color: #aaaaaa;
            font-family: Roboto Mono, sans-serif;
            font-weight: normal;
            font-size: 18px;
            line-height: 22px;
        }

        .bg-primray {
            background: #f46e6c !important;
        }
    </style>
</head>


<body style="margin: 0; padding: 0;" @if ($lang == 'ara') dir="rtl" @endif>
    <!-- CONTAINER TABLE -->
    <div style="border: 0; padding: 0; margin: 0; width: 100%; table-layout: fixed;">
        <div style="background-color: #333333; padding: 20px 0;margin:0 auto;">
            <div class="logo-img" style="display:flex; justify-content: center;">

                <img src="{{ asset('img/logo-name.png') }}" style="height: 40px; width:auto;">
            </div>
        </div>
        <div style="background-color: #333333; padding: 20px 0;">
            <!-- WRAPPER DIV -->
            <div style="max-width: 600px; margin: 0 auto;">
                <div style="text-align: left">
                    <img src="{{ asset('img/email_image.png') }}" alt="Look at that full class" width="600"
                        height="236"
                        style="display: block; padding: 0; color: #ffffff; font-family: sans-serif; font-weight: bold; font-size: 24px; background-color: #f46e6c; border-radius: 4px; height: auto; margin: 0 auto;" />
                </div>
                <div
                    style="padding: 20px 0 10px 0; color: #ffffff; font-family: sans-serif; font-weight: bold; font-size: 32px; line-height: 36px;">
                </div>
                <div class="msg-block">
                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    <!-- CONTAINER TABLE -->
    <div style="border: 0; padding: 0; margin: 0; width: 100%; table-layout: fixed;">
        <div style="text-align: center; background-color: #ebeef2; padding: 40px 0;">
            <!-- WRAPPER DIV -->
            <div style="max-width: 600px; margin: 0 auto;">
                <!-- TWO COLUMNS -->
                <div style="display: flex; flex-wrap: wrap;">
                    <!-- LEFT COLUMN -->
                    <div style="flex-basis: 47%; max-width: 47%; margin-right: 3%;" class="card-img">
                        <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; min-height:310px">
                            <img src="{{ asset('img/coffee_shop.jpg') }}" alt="Get typing" width="280" height="185"
                                style="" class="fluid-image" />
                            <div style="padding: 20px; color: #111111; font-family: Roboto Mono, sans-serif;">
                                @if ($lang == 'ara')
                                    تعزيز التواصل مع العملاء والولاء في مقهاك
                                @else
                                    Enhancing Customer Engagement and Loyalty in Your Café
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- RIGHT COLUMN -->
                    <div style="flex-basis: 47%; max-width: 47%; margin-left: 3%;" class="card-img">
                        <div style="background-color: #ffffff; border-radius: 8px; overflow: hidden; min-height:310px">
                            <img src="{{ asset('img/food_truck.jpg') }}" width="280" height="185" style=""
                                class="fluid-image" />
                            <div style="padding: 20px; color: #111111; font-family: Roboto Mono, sans-serif;">
                                @if ($lang == 'ara')
                                    تطوير تجربة شاحنتك الغذائية من خلال العروض والمكافآت القائمة على الموقع
                                @else
                                    Elevate Your Food Truck Experience with Location-Based Promotions and Rewards
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
                <tr>
                    <td align="center" style="padding: 20px 0 20px 0;">
                        <!-- WRAPPER TABLE -->
                        <table border="0" cellpadding="0" cellspacing="0" width="600" align="center"
                            class="wrapper">
                            <tr>
                                @if ($lang == 'ara')
                                    <td align="center" dir="rtl"
                                        style="padding: 10px 0 10px 0; color: #666666; font-family: Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 18px;"
                                        class="mobile-text-pad">
                                        تعبت من هذه الرسائل الإلكترونية؟ <a href="#"
                                            style="color: #f46e6c; text-decoration: none;">إلغاء الاشتراك</a> فورًا.
                                    </td>
                                @else
                                    <td align="center"
                                        style="padding: 10px 0 10px 0; color: #666666; font-family: Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 18px;"
                                        class="mobile-text-pad">
                                        Sick of these emails? <a href="#"
                                            style="color: #f46e6c; text-decoration: none;">Unsubscribe</a> immediately.
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td align="center"
                                    style="padding: 10px 0 10px 0; color: #666666; font-family: Arial, sans-serif; font-weight: normal; font-size: 14px; line-height: 18px;"
                                    class="mobile-text-pad">
                                    <span class="apple-links" style="color: #666666; text-decoration: none;">&#169;
                                        {{ config('app.name') . ' ' . date('Y') }}<br></span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>


    <!-- FOOTER -->

</body>

</html>
