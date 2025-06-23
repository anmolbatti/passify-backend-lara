@extends('emails.layout')
@section('content')
    <div class="block" dir="rtl">
        عزيزي/عزيزتي {{ $data['name'] }},<br>
        <div style="margin-top: 20px; text-align:right">
            مرحبًا بك في باسيفي! تم تأكيد اشتراكك.
        </div>
        <div style="margin-top: 15px; text-align:right">
            <strong> التفاصيل:</strong> <br />
            - النوع: بريميوم <br />
            - تاريخ البدء: {{ $data['date'] }} <br />
            - تاريخ التجديد: {{ $data['renewDate'] }} <br />
            - الخطة: {{ $data['planName'] }}
        </div>
    </div>

    <div style="margin-top: 20px; text-align:right" class="block">
        ماذا بعد:
        <ol style="margin-top: 10px; margin-right: 20px; text-align:right">
            <li>
                تفقد بريدك الوارد للحصول على التحديثات والمحتوى الحصري.
            </li>
            <li>
                تابعنا على وسائل التواصل الاجتماعي: @passify25.
            </li>
            <li>
                لديك أسئلة؟ أرسل لنا بريدًا إلكترونيًا على support@passify.info.
            </li>
        </ol>
    </div>

    <div style="margin-top: 20px; text-align:right" class="block">
        شكرًا لانضمامك إلينا!
    </div>
    <div style="margin-top: 20px; text-align:right" class="block" dir="rtl">

        أطيب التحيات، <br />
        فريق باسيفاي
    </div>
@endsection
