<div class="design-container">
<div class="card design-card bg-transparent coupon_card_2">
<div class="card-body p-[5px] bg-slate-400">

<div class="bg-[#f0eff5] mt-3 h-[520px] overflow-y-auto rounded-md">
    
       <div class="flex flex-col gap-[20px]">


                <div class="front_card coupon_card_2  rounded-[12px] box" style="background-color: {{ $pass->card_bg_color ?? '' }}">
                <div class="flex flex-col items-center px-[10px]">
                    <div class=" w-[87px] h-[87px] flex items-center relative ">
                        <img src="{{$pass->logo_image ?? asset('user-dashboard/img/logo.svg')}}" alt="" class="img-logo img-fluid absolute w-[100%] h-[100%]" >
                    </div>

                    <div class="max-w-[180px] w-full h-full text-center">
                        <p class="text-[14px] font-[300]">Collect stamps for cool rewards!</p>
                    </div>


                    <div class="text-center bg-white"
                  style="width:160px; margin:0 auto; margin-top:40px;">
                  @isset($pass->qr_type)
                  @switch($pass->qr_type)
                      @case('qr_code')
                          <img src="{{ asset('img/qr_A.png') }}"
                              class="img-fluid w-100 mx-auto barcode_img_2">
                          @break
                      @case('aztec')
                          <img src="{{ asset('img/qr_B.png') }}"
                              class="img-fluid w-100 mx-auto barcode_img_2">
                          @break
                      @case('pdf_417')
                          <img src="{{ asset('img/b1.png') }}"
                              class="img-fluid w-100 mx-auto barcode_img_2">
                          @break
                      @case('code_128')
                          <img src="{{ asset('img/b2.png') }}"
                              class="img-fluid w-100 mx-auto barcode_img_2">
                          @break

                      @default
                      <img src="{{ asset('img/b2.png') }}"
                          class="img-fluid w-100 mx-auto barcode_img_2">
                  @endswitch
                  @else
                  <img src="{{ asset('img/qr_A.png') }}" class="img-fluid w-100 mx-auto barcode_img_2">
                  @endisset
                </div>


                <div class="w-full h-[108px] bg-center bg-no-repeat bg-cover p-[5px] flex items-center relative" style="background-color: {{ $pass->strip_bg_color ?? '' }}">
                    <div id="stamp_area" class="hero-bg flex flex-wrap items-center justify-center gap-[8px] h-[100%] w-[100%] z-0">
                    </div>
                    <img class="strip_image_preview z-100 absolute right-0 w-full h-auto">
                </div>


                <div class="p-2 border-t-[1px] border-b-[1px] bg-[#fff] mt-3">
                    <p class="text-[11px] text-[#7f7f7f]">LATEST UPDATES Any messages you send will be displayed here.</p>
                </div>
                <div class="p-2 border-t-[1px] border-b-[1px] bg-[#fff]">
                    <p class="text-[11px] text-[#7f7f7f]">HOW TO COLLECT STAMPS Spend $5 to get 1 stamp.</p>
                </div>
                <div class="p-2 border-t-[1px] border-b-[1px] bg-[#fff]">
                    <p class="text-[11px] text-[#7f7f7f]">REWARD DETAILS You will get a free coffee after collecting 8 stamps.</p>
                </div>
                <div class="p-2 border-t-[1px] border-b-[1px] bg-[#fff]">
                    <p class="text-[11px] text-[#7f7f7f]">STAMPS UNTIL NEXT REWARD 8</p>
                </div>
                <div class="p-2 border-t-[1px] border-b-[1px] bg-[#fff]">
                    <p class="text-[11px] text-[#7f7f7f]">REWARDS EARNED 0: Free coffee</p>
                </div>
                <div class="p-2 border-t-[1px] border-b-[1px] bg-[#fff]">
                    <p class="text-[11px] text-[#7f7f7f]">USEFUL LINKS </p>
                </div>
                <div class="p-2 border-t-[1px] border-b-[1px] bg-[#fff]">
                    <p class="text-[11px] text-[#7f7f7f]">TERMS & CONDITIONS
                        1. Earn 1 stamp for every _______________ purchased.
                        2. Collect __ stamps to receive a _______________ upon your next visit.
                        3. This card, stamps, and rewards are valid until_______________.
                        4. This card can only be used at _______________ (and _______________).
                        5. Stamps and rewards cannot be exchanged, refunded, replaced or redeemed for cash.
                        6. Cards are non-transferrable and cannot be combined with other cards.
                        7. The Company reserve the right of final decisions in case of any disputes.

                    </p>
                </div>


</div>

           </div>
           </div>


                



       </div>
     


</div>

</div>

</div>
