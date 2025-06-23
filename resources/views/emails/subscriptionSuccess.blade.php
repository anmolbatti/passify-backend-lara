    @extends('emails.layout')
    @section('content')
        <div class="block">
            Dear {{ $data['name'] }}, <br />
            <div style="margin-top: 20px;">
                Welcome to Passify! Your subscription is confirmed.
            </div>
            <div style="margin-top: 15px;">
                <strong> Details:</strong> <br />
                - Type: Premium <br />
                - Start Date: {{ $data['date'] }} <br />
                - Renewal Date: {{ $data['renewDate'] }} <br />
                - Plan: {{ $data['planName'] }}
            </div>
        </div>

        <div style="margin-top: 20px;" class="block">
            What's Next:
            <ol style="margin-top: 10px; margin-left: 20px;">
                <li>Watch your inbox for updates and exclusive content.</li>
                <li>Follow us on social media: @passify25.</li>
                <li>Questions? Email us at support@passify.info.</li>
            </ol>
        </div>

        <div style="margin-top: 20px;" class="block">
            Thanks for joining us!
        </div>
        <div style="margin-top: 20px;" class="block">
            Best regards,<br>
            The Passify Team
        </div>
    @endsection
