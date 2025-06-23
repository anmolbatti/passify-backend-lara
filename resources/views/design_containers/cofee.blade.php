<div class="design-container">
    <div class="card design-card bg-transparent coupon_card_2">
        <div class="card-body p-[7px]">
            <div class="flex flex-col gap-[20px] ">
                <div class="flex justify-between">
                  <div class="w-[50px] text-center">
                    <p class="text-[12px] font-[500] text-[#000000]"> 16:36 </p>
                  </div>

                  <div class="flex items-center justify-center gap-[7px]">
                      <img src="{{asset('user-dashboard/img/Wifi.svg')}}" alt="wifi" class="h-[8px]">
                      <img src="{{asset('user-dashboard/img/CellularConnection.svg')}}" alt="CellularConnection" class="h-[8px]">
                      <img src="{{asset('user-dashboard/img/Battery.svg')}}" alt="Battery" class="h-[8px]">
                  </div>

                </div>

                <div class="flex justify-between items-center">
                  <button class="text-[14px] font-[600] cursor-pointer text-[#000000]">Done</button>

                  <img src="{{asset('user-dashboard/img/dots-three-circle-fill-svgrepo-com.svg')}}" alt="dots" class="w-[20px] h-[20px] cursor-pointer">
                </div>

                <div class="front_card coupon_card_2  rounded-[12px] box" style="background-color: {{ $pass->card_bg_color ?? '' }}">
                  <div class="flex justify-between items-center px-[10px]">
                    <div class=" w-[87px] h-[87px] flex items-center relative">
                        <img src="{{$pass->logo_image ?? asset('user-dashboard/img/logo.svg')}}" alt="" class="img-logo img-fluid absolute w-[100%] h-[100%]" >
                    </div>

                    <div>
                      <p class="header_label text-[14px] font-[500] leading-normal change_input card_text" style="color: {{ $pass->card_txt_color ?? 'rgb(255,255,255)' }}">{{ 'POINTS' }}</p>
                      <p class="header_value text-[17px] font-[500] card_text" style="color: {{ $pass->card_txt_color ?? 'rgb(222, 222, 222)' }}">{{ '3393' }}</p>
                    </div>
                  </div>


                  <div class="w-full h-[108px] bg-center bg-no-repeat bg-cover p-[5px] flex items-center relative" style="background-color: {{ $pass->strip_bg_color ?? '' }}">
                    <!-- <div id="stamp_area" class="hero-bg flex flex-wrap items-center justify-center gap-[8px] h-[100%] w-[100%] z-0">
                    </div> -->
                    <img class="strip_image_preview z-100 absolute right-0 w-full h-auto">
                </div>

       <div class="p-[10px] ">
          <div class="flex justify-between items-center">
            <div class="flex flex-col gap-[5px]">
                <p class="secondary_label_1 text-[8px] font-[400] card_text" id="first_label_value" style="color: {{ $pass->card_txt_color ?? 'rgb(255,255,255)' }}">

                  {{ 'REWARD AVAILABLE' }}
                </p>
                <P class="secondary_value_1 text-[23px] font-[300] card_text" style="color: {{ $pass->card_txt_color ?? 'rgb(222, 222, 222)' }}">{{ '$3.00' }}</P>
            </div>

            <div class="flex flex-col gap-[5px]">
                <p class="secondary_label_2 text-[8px] font-[400] card_text" id="second_label_value" style="color: {{ $pass->card_txt_color ?? 'rgb(255,255,255)' }}">
                    {{ '$3.00' }}
                </p>
                <P class="secondary_value_2 text-[23px] font-[300] card_text" style="color: {{ $pass->card_txt_color ?? 'rgb(222, 222, 222)' }}">{{ '$3.00' }}</P>
            </div>

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

        </div>
      </div>

        </div>


        </div>
    </div>



</div>
