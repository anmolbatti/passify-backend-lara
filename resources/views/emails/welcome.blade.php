@extends('emails.layout')
@section('content')
    <div class="block">
        Dear {{ $name }}, <br />
        <div style="margin-top: 20px;">
            Welcome to Passify, your ultimate destination for a seamless digital experience with Google
            Wallet and Apple Wallet! We are thrilled to have you on board, and we can't wait to enhance your
            everyday transactions and activities.
        </div>
        <div style="margin-top: 15px;">
            <strong>Why Passify?</strong> <br />
            Passify is not just a loyalty program; it's your digital companion for managing event tickets,
            boarding passes, generic passes, and dynamic loyalty cards. It's time to declutter your physical
            wallet and embrace the future of digital convenience.
        </div>
    </div>
    <div style="margin-top: 20px;" class="block">
        Your Passify Benefits:
        <ol style="margin-top: 10px; margin-left: 20px;">
            <li>Digital Wallet Integration: Link your Google Wallet and Apple Wallet to access a world of
                convenience right at your fingertips.</li>
            <li>Event Tickets: Enjoy hassle-free event entry with our digital event tickets. No more worries
                about losing paper tickets – your smartphone is your ticket!</li>
            <li>Boarding Passes: Say goodbye to printing boarding passes. Access and store your boarding
                passes digitally for a stress-free travel experience.</li>
            <li>Generic Passes: Store all kinds of passes, from membership cards to discount vouchers, in
                one secure digital location.</li>
            <li>Loyalty Passes with Dynamic Data: Your loyalty cards are now smarter than ever. Experience
                personalized offers and real-time updates as you engage with your favorite brands.</li>
        </ol>
    </div>
    <div style="margin-top: 20px;" class="block">
        Stay Connected: Follow us on social media to stay updated on the latest features, promotions, and
        exciting partnerships. We love hearing from our users, so feel free to share your Passify
        experiences with us!, Should you need any assistance or have any questions, feel free to reach out
        to us at support@passify.info.
    </div>
    <div style="margin-top: 20px;" class="block">
        Get ready to revolutionize the way you manage your digital life with Passify. Thank you for choosing
        us – your key to a smarter, more organized, and rewarding digital experience.
    </div>
    <div style="margin-top: 20px;" class="block">
        Best regards,<br>
        The Passify Team
    </div>
@endsection
