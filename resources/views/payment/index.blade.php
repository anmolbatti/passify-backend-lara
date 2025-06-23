@extends('layouts.user-dashboard')
@section('content')
    <div class="container p-5">
        <div class="p-5">
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>

        <form action="{{ route('payment.make') }}" id="payform" method="post">
            @csrf
            <span id="paymentErrors"></span>
            <div class="row">
                <label>Card Number</label>
                <input type="text" data-paylib="number" size="20" class="form-control">
            </div>
            <div class="row">
                <label>Expiry Date (MM/YYYY)</label>
                <div class="col">

                    <input type="text" data-paylib="expmonth" size="2" class="form-control">
                </div>
                <div class="col">
                    <input type="text" data-paylib="expyear" size="4" class="form-control">
                </div>
            </div>
            <div class="row">
                <label>Security Code</label>
                <input type="text" data-paylib="cvv" size="4" class="form-control">
            </div>
            <input type="submit" class="btn btn--theme mt-2" value="Place order">
        </form>

    </div>
@endsection

@push('script')
    <script src="https://secure.paytabs.sa/payment/js/paylib.js"></script>
    <script type="text/javascript">
        var myform = document.getElementById('payform');
        let clientKey = "{{ config('paytabs.paytab_client') }}";
        paylib.inlineForm({
            'key': `${clientKey}`,
            'form': myform,
            'autoSubmit': true,
            'callback': function(response) {
                document.getElementById('paymentErrors').innerHTML = '';
                if (response.error) {
                    paylib.handleError(document.getElementById('paymentErrors'), response);
                }

                console.log(response);
            }
        });
    </script>
@endpush
