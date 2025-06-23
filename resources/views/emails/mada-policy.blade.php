@extends('emails.layout')
@section('content')
    <div class="block">
        Dear {{ $data['name'] }}, <br />
        <div style="margin-top: 20px;">
            Thank you for choosing Passify. We are writing to confirm the details of your recurring payment plan, as per
            Mada regulations:
        </div>
    </div>
    <div style="margin-top: 20px;" class="block">
        <ol style="margin-top: 10px; margin-left: 20px;">
            <li>Agreement ID: {{ $data['unique_id'] }}.</li>
            <li>Service Description: Information Technology</li>
            <li>Payment Amount: {{ $data['amount'] . ' ' . $data['currency'] }}.</li>
            <li>Payment Type: Fixed.</li>
            <li>Service Duration: {{ $data['plan_type'] }}.</li>
            <li>Next Payment Date: {{ $data['renewDate'] }}</li>
            <li>First Transaction Authentication ID: {{ $data['trans_ref'] }}</li>
        </ol>
    </div>
    <div style="margin-top: 20px;" class="block">
        Terms and Conditions: <br />
        <a href="{{ route('terms') }}">Please click here to review the terms and conditions.</a>
    </div>
    <div style="margin-top: 20px;" class="block">
        Cancellation Process: <br />
        To cancel this recurring payment agreement, please visit our passify.info and initiate a cancellation request.
    </div>
    <div style="margin-top: 20px;" class="block">
        Contact Us: <br />
        If you have any questions or need further assistance, please contact us at support@passify.info.

        Thank you for your continued trust in our services.
    </div>
    <div style="margin-top: 20px;" class="block">
        Best regards,<br>
        The Passify Team
    </div>
@endsection
