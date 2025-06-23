@extends('emails.layout')
@section('content')
    <div class="block">
        # New Support Query From Mr/Mrs {{ $data['name'] }}
        <div style="margin-top: 20px;">
            Email : {{ $data['email'] }}, <br />
            Subject : {{ $data['subject'] }} <br />
            Message : {{ $data['msg'] }}
        </div>
    </div>

    <div style="margin-top: 20px;" class="block">
        Best regards,<br>
        The Passify Team
    </div>
@endsection
