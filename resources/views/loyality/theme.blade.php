<div class="p-[10px]">

    <div>
        <div class="container mb-3">
            <div class="form-group">
                <div class="flex items-center gap-[5px] py-3">
                    <h3 class="text-[1.1em] font-[600]">{{ __('Type') }} </h3>
                    <i class='bx bxs-info-circle text-[18px] '></i>
                </div>

                <div class="mt-4 d-flex gap-[5px]">
                    <label class="radio-choice ng-binding text-[14px] font-[400]">
                        <input type="radio" name="reward_type" onchange="reward_type_check()"
                            {{ old('reward_type') == 'single' ? 'checked' : 'checked' }}
                            {{ isset($pass->reward_type) ? ($pass->reward_type == 'single' ? 'checked' : 'checked') : '' }}
                            value="single">
                        {{ __('Single Reward') }}
                    </label>
                    <label class="radio-choice ng-binding text-[14px] font-[400]">
                        <input type="radio" name="reward_type" onchange="reward_type_check()"
                            {{ old('reward_type') == 'multi' ? 'checked' : '' }}
                            {{ isset($pass->reward_type) ? ($pass->reward_type == 'multi' ? 'checked' : '') : '' }}
                            value="multi">
                        {{ __('Multi Reward') }}
                    </label>
                </div>
                @error('reward_type')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror

                <hr class="mt-[40px] text-[#f74780]" />

                <h3 class="text-[18px] font-[600] py-3">{{ __('Images') }}</h3>
                <!-- <div id="stamp_area" class="fixed hero-bg flex flex-wrap items-center justify-center gap-[8px] h-[108px] w-[240px] z-[-1]">
                </div> -->
                <div id="stamp_area"
                    class="fixed hero-bg flex flex-wrap items-center justify-center gap-[8px] h-[108px] w-[240px] z-[-1]">
                </div>



                <!-- image  -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="flex items-center gap-[5px] py-1">
                            <p class="text-[15px] font-[500]"> {{ __('Logo') }}</p>
                            <i class='bx bxs-info-circle text-[18px]'></i>
                        </div>
                        <label for="logo_image" class="logo_img max-w-full rounded-md" id="logo_image_box">
                            <img src="{{ asset($pass->logo_image ?? 'img/logo.png') }}" alt=""
                                class="img-fluid img-logo">
                            <div class="middle-logo">
                                {{ __('CHOOSE IMAGE') }}
                            </div>
                        </label>

                        <input type="file" accept="image/*" name="logo_image" id="logo_image"
                            onchange="changeBgImage('logo_image','img-logo');handlestampImageChange('logo_image','logo_image_name','logo_cross_icon')"
                            class="form-control d-none">

                        <div class="flex justify-between">
                            <p id="logo_image_name" class="text-[12px]"></p>
                            <div id="logo_cross_icon" class="text-[22px] cursor-pointer"
                                onclick="delete_upload_stamp_image('logo_cross_icon','logo_image_name','img-logo')">
                            </div>

                        </div>

                        <p class="text-[0.7rem] font-[300]">{{ __('Recommended size: 87x87 pixels. Must be square.') }}
                        </p>
                        @error('logo_image')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="col-md-6">
                        <div class="flex items-center gap-[5px] py-1">
                            <p class="text-[15px] font-[500]"> {{ __('Icon') }}</p>
                            <i class='bx bxs-info-circle text-[18px]'></i>
                        </div>
                        <label for="icon_image" class="logo_img max-w-full rounded-md" id="icon_image_box">
                            <img src="{{ asset($pass->icon_image ?? 'img/logo.png') }}" alt=""
                                class="img-fluid icon-logo">
                            <div class="middle-logo">
                                {{ __('CHOOSE IMAGE') }}
                            </div>
                        </label>

                        <input type="file" accept="image/*" name="icon_image" id="icon_image"
                            onchange="changeBgImage('icon_image','icon-logo');handlestampImageChange('icon_image','icon_image_name','cross_icon')"
                            class="form-control d-none">


                        <div class="flex justify-between">
                            <p id="icon_image_name" class="text-[12px]"></p>
                            <div id="cross_icon" class="text-[22px] cursor-pointer"
                                onclick="delete_upload_stamp_image('cross_icon','icon_image_name','icon-logo','circle','select_name')">
                            </div>

                        </div>

                        <p class="text-[0.7rem] font-[300]">{{ __('Recommended size: 87x87 pixels. Must be square.') }}
                        </p>
                        @error('icon_image')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="mt-5 text-[#f74780]" />

            <div class="row">
                <div class="col-md-6">

                    <h3 class="pt-3 font-[600] mb-[5px] flex items-center gap-[2px]">
                        {{ __('Stamps') }}
                        <span uib-tooltip="The total number of stamps you want on your card."
                            tooltip-placement="right"></span>
                        <i class='bx bxs-info-circle text-[18px]'></i>
                    </h3>
                    <select onchange="rander_stamps(this.value)" name="no_of_stamps"
                        class="form-control p-3 text-[#a7a7a7] cursor-pointer hideArrow">
                        @for ($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}"
                                {{ isset($pass->no_of_stamps) && $pass->no_of_stamps == $i ? 'selected' : '' }}>
                                {{ $i }} {{ __('stamp') }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-6">

                    <h3 class="pt-3 mb-[5px] font-[600] flex items-center gap-[2px]">
                        {{ __('Category') }}
                        <span uib-tooltip="The Library Category for stamps" tooltip-placement="right"></span>
                        <i class='bx bxs-info-circle text-[18px]'></i>
                    </h3>
                    <select name="category" class="form-control p-3 text-[#a7a7a7] cursor-pointer hideArrow">
                        <option value="Coffee">Coffee</option>
                        <option value="Saloon">Saloon</option>
                        <option value="Spa">Spa</option>
                        <option value="Restaurant">Restaurant</option>
                    </select>
                </div>
            </div>



            <div class="my-3 flex flex-col gap-3 md:flex-row md:justify-between">
                <div class="col-md-5 bg-[#f8f8f8] rounded-lg p-2">
                    <p class="text-[14px] font-[400] py-2">{{ __('Pick stamped Icon') }}</p>
                    <div class="flex justify-center md:justify-between items-center flex-col md:flex-row">
                        <div class="grid grid-cols-5 gap-4">
                        <input type="hidden" style="display:none;" name="stamped_icon" id="stamped_icon" value="{{ $stamps['Tea'] }}" />
                            @foreach ($stamps as $key => $stamp)
                                <div data-img="{{ $stamp }}" class="cursor-pointer stamp-icons"
                                    onclick="changeImage(this)">
                                    <img src="{{ $stamp }}" alt="{{ $key }}">
                                </div>
                            @endforeach

                        </div>
                        <div class="w-[100%] md:w-[50%] p-2 md:p-5" style='font-size:75px'>
                            <div class="stamped_display flex items-center justify-center">
                                {{-- <i class="{{ $pass->picked_stamps_icon ?? '' }}"></i> --}}
                                <img src="{{ $stamps['Tea'] }}" id="picked_stamps">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 bg-[#f8f8f8] rounded-lg p-2">
                    <p class="text-[14px] font-[400] py-2">{{ __('Pick Unstamped Icon') }}</p>
                    <div class="flex justify-center md:justify-between items-center flex-col md:flex-row">
                        <div class="grid grid-cols-5 gap-4">
                        <input type="hidden" style="display:none;" name="unstamped_icon" id="unstamped_icon" value="{{ $stamps['Tea'] }}" />
                            @foreach ($stamps as $key => $stamp)
                                <div data-img="{{ $stamp }}" class="cursor-pointer unstamp-icons"
                                    onclick="changeImage(this)">
                                    <img src="{{ $stamp }}" alt="{{ $key }}">
                                </div>
                            @endforeach

                        </div>
                        <div class="w-[100%] md:w-[50%] p-2 md:p-5" style='font-size:75px'>
                            <div class="unstamped_display flex items-center justify-center">
                                {{-- <i class="{{ $pass->un_stamps_icon ?? '' }}"></i> --}}
                                <img src="{{ $stamps['Tea'] }}" id="unpicked_stamps">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
        </div>


        <div class="row gap-3">
            <div class="col-md-5 bg-[#f8f8f8] rounded-lg p-2">
                <div class="flex items-center gap-[5px] py-1">
                    <p class="text-[15px] font-[500]"> {{ __('Pick Stamped Image') }}</p>
                    <i class='bx bxs-info-circle text-[18px]'></i>
                </div>
                <label for="picked_stamps_image" class="picked_stamps_image max-w-full rounded-md"
                    id="picked_stamps_image_box">
                    <img src="{{ asset($pass->picked_stamps_image ?? 'img/logo.png') }}" alt=""
                        class="img-fluid img-stamped">
                    <div class="middle-logo">
                        {{ __('CHOOSE IMAGE') }}
                    </div>
                </label>

                <input type="file" accept="image/*" name="picked_stamps_image" id="picked_stamps_image"
                    onchange="changeBgImage('picked_stamps_image','img-stamped'); change_circle_image('picked_stamps_image','stamped_circle'); handlestampImageChange('picked_stamps_image','stamp_Upload_Image_Name','stamp_Upload_cross_icon')"
                    class="form-control d-none">

                <div class="flex justify-between">
                    <p id="stamp_Upload_Image_Name" class="text-[12px]"></p>
                    <div id="stamp_Upload_cross_icon" class="text-[22px] cursor-pointer"
                        onclick="delete_upload_stamp_image('stamp_Upload_cross_icon','stamp_Upload_Image_Name','img-stamped','stamped_circle','picked_stamps_icon')">
                    </div>
                </div>



                <p class="text-[0.7rem] font-[300]">{{ __('Recommended size: 87x87 pixels. Must be square.') }}
                </p>
                @error('picked_stamps_image')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-5 ml-11 bg-[#f8f8f8] rounded-lg p-2">
                <div class="flex items-center gap-[5px] py-1">
                    <p class="text-[15px] font-[500]"> {{ __('Pick Un-stamped Image') }}</p>
                    <i class='bx bxs-info-circle text-[18px]'></i>
                </div>
                <label for="un_stamps_image" class="logo_img max-w-full rounded-md" id="un_stamps_image_box">
                    <img src="{{ asset($pass->un_stamps_image ?? 'img/logo.png') }}" alt=""
                        class="img-fluid img-unstamp">
                    <div class="middle-logo">
                        {{ __('CHOOSE IMAGE') }}
                    </div>
                </label>

                <input type="file" accept="image/*" name="un_stamps_image" id="un_stamps_image"
                    onchange="changeBgImage('un_stamps_image','img-unstamp'); change_circle_image('un_stamps_image','unstamped_circle');handlestampImageChange('un_stamps_image','unstamp_Upload_Image_Name','unstamp_Upload_cross_icon')"
                    class="form-control d-none">

                <div class="flex justify-between">
                    <p id="unstamp_Upload_Image_Name" class="text-[12px]"></p>
                    <div id="unstamp_Upload_cross_icon" class="text-[22px] cursor-pointer"
                        onclick="delete_upload_stamp_image('unstamp_Upload_cross_icon','unstamp_Upload_Image_Name','img-unstamp','unstamped_circle','un_stamps_icon')">
                    </div>
                </div>






                <p class="text-[0.7rem] font-[300]">{{ __('Recommended size: 87x87 pixels. Must be square.') }}
                </p>
                @error('un_stamps_image')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
        </div>



        <div id="accordion-collapse" data-accordion="collapse" class="flex flex-col gap-[14px]">

            <div class="d-flex align-items-center gap-2">
                <h1 class="font-weight-bold text-20px py-3">{{ __('Colors') }}</h1>
                <i class="bx bxs-info-circle text-18px"></i>
            </div>
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200  dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 bg-white text-black"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                    aria-controls="accordion-collapse-body-1">
                    <span>{{ __('Card') }}</span>
                    @error('card_txt_color')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    @error('card_bg_color')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div
                    class="rounded-[10px] p-2 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900 bg-white">
                    <div class="flex justify-start">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="theme_color" class="mb-3">{{ __('Background') }}</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input name="card_bg_color" id="card_bg_color"
                                            value="{{ old('card_bg_color') ?? ($pass->card_bg_color ?? 'rgb(0,0,0)') }}"
                                            class="form-control" placeholder="color code here">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="color" id="card_bg_color_picker"
                                            onchange="updateBgColorValueOfId('card_bg_color_picker','card_bg_color','front_card')"
                                            value="{{ old('card_bg_color') ?? ($pass->card_bg_color ?? 'rgb(0,0,0)') }}"
                                            class="form-control form-control-color">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="text_color" class="mb-3">{{ __('Text') }}</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input name="card_txt_color" id="card_txt_color"
                                            value="{{ old('card_txt_color') ?? ($pass->card_txt_color ?? 'rgb(255,255,255)') }}"
                                            class="form-control" placeholder="color code here">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="color" id="card_txt_color_picker"
                                            onchange="updateColorValueOfId('card_txt_color_picker','card_txt_color','card_text')"
                                            value="{{ old('card_txt_color') ?? ($pass->card_txt_color ?? 'rgb(255,255,255)') }}"
                                            class="form-control form-control-color">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 bg-white text-black"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span>{{ __('Strip Background') }}</span>
                    @error('strip_bg_image')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    @error('strip_bg_color')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="rounded-[10px] p-2 border border-b-0 border-gray-200 dark:border-gray-700">
                    <div class="flex justify-start">
                        <div class="row">
                            <label for="theme_color" class="mb-3">{{ __('Strip Background') }}</label>
                            <div class="col-md-6">
                                <input name="strip_bg_color" id="strip_bg_color"
                                    value="{{ old('strip_bg_color') ?? ($pass->strip_bg_color ?? 'rgb(255,255,255)') }}"
                                    class="form-control" placeholder="color code here">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input
                                            value="{{ old('strip_bg_color') ?? ($pass->strip_bg_color ?? 'rgb(255,255,255)') }}"
                                            type="color" id="strip_bg_color_picker"
                                            onchange="updateBgColorValueOfId('strip_bg_color_picker','strip_bg_color','hero-bg')"
                                            class="form-control form-control-color">
                                    </div>
                                    <div class="col-md-10 mt-2">
                                        <div class="col-md-12 bg-[#f8f8f8] rounded-lg">
                                            <div class="flex items-center py-1">
                                                <p class="text-[15px] font-[500]"> {{ __('Pick Image') }}</p>
                                                <i class='bx bxs-info-circle text-[18px]'></i>
                                            </div>
                                            <label for="change_strip_bg_image" class="logo_img max-w-full rounded-md"
                                                id="change_strip_bg_image_box">
                                                <img src="{{ asset($pass->change_strip_bg_image ?? 'img/logo.png') }}"
                                                    alt="" class="img-fluid img-unstamped">
                                                    <input type="file" accept="image/*" name="all_stamps_bg_image" id="all_stamps_bg_image"
                                                        onchange="changeBgImage('all_stamps_bg_image','img-logo');handlestampImageChange('all_stamps_bg_image','all_stamps_bg_image_name','logo_cross_icon')"
                                                        class="form-control d-none">

                                                    <div class="flex justify-between">
                                                        <p id="all_stamps_bg_image_name" class="text-[12px]"></p>
                                                        <div id="all_stamps_bg_image_icon" class="text-[22px] cursor-pointer"
                                                            onclick="delete_upload_stamp_image('logo_cross_icon','all_stamps_bg_image_name','img-logo')">
                                                        </div>

                                                    </div>
                                                <div class="middle-logo">
                                                    {{ __('CHOOSE IMAGE') }}
                                                </div>
                                            </label>

                                            <input type="file" accept="image/*" name="change_strip_bg_image"
                                                id="change_strip_bg_image"
                                                onchange="updateBgImage(this);handlestampImageChange('change_strip_bg_image','stripBg_image_name','stripBg_cross_icon')"
                                                class="form-control d-none">
                                            <div class="flex justify-between">
                                                <p id="stripBg_image_name" class="text-[12px]"></p>
                                                <div id="stripBg_cross_icon" class="text-[22px] cursor-pointer"
                                                    onclick="empty_hero_bg();delete_upload_stamp_image('stripBg_cross_icon','stripBg_image_name','img-unstamped','circle','select_name')">
                                                </div>

                                            </div>





                                            <p class="text-[0.8rem] font-[250]">
                                                {{ __('Recommended size: 87x87 pixels. Must be square.') }}</p>
                                            @error('change_strip_bg_image')
                                                <div class="text-red-600">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- {{-- <input type="file" accept="image/*" name="change_strip_bg_image" class="form-control" onchange="updateBgImage(this)" /> --}} -->
                                    </div>
                                </div>
                            </div>
                            <input name="strip_bg_image" class="strip_image_value form-control" type="hidden" />
                        </div>
                    </div>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-3">
                <button type="button"
                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 bg-white text-black"
                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span>{{ __('Stamp Circle') }}</span>
                    @error('stamps_color')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    @error('stamps_border_color')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                <div class="rounded-[10px] p-2 border border-t-0 border-gray-200 dark:border-gray-700">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="theme_color" class="mb-3">{{ __('Circle') }}</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input name="stamps_color" id="stamps_color"
                                        value="{{ old('stamps_color') ?? ($pass->stamps_color ?? 'rgb(0,255,0)') }}"
                                        class="form-control" placeholder="color code here">
                                </div>
                                <div class="col-md-1">
                                    <input
                                        value="{{ old('stamps_color') ?? ($pass->stamps_color ?? 'rgb(0,255,0)') }}"
                                        type="color" id="stamps_color_picker"
                                        onchange="updateBgColorValueOfId('stamps_color_picker','stamps_color','circle')"
                                        class="form-control form-control-color">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="text_color" class="mb-3">{{ __('Circle Border') }}</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input name="stamps_border_color" id="stamps_border_color"
                                        value="{{ old('stamps_border_color') ?? ($pass->stamps_border_color ?? 'rgb(255,0,0)') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <input
                                        value="{{ old('stamps_border_color') ?? ($pass->stamps_border_color ?? 'rgb(255,0,0)') }}"
                                        type="color" id="stamps_border_color_picker"
                                        onchange="updateBorderColorValueOfId('stamps_border_color_picker','stamps_border_color','circle')"
                                        class="form-control form-control-color">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-3-1">
                <button type="button"
                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 bg-white text-black"
                    data-accordion-target="#accordion-collapse-body-3-1" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span>{{ __('Stamp') }}</span>
                    @error('stamps_color')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    @error('stamps_border_color')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </button>
            </h2>
            <div id="accordion-collapse-body-3-1" class="hidden" aria-labelledby="accordion-collapse-heading-3-1">
                <div class="rounded-[10px] p-2 border border-t-0 border-gray-200 dark:border-gray-700">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="theme_color" class="mb-3">{{ __('Stamped Image') }}</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input name="stamp_image_color" id="stamp_image_color"
                                        value="{{ old('stamp_image_color') ?? ($pass->stamp_image_color ?? 'rgb(255,255,255)') }}"
                                        class="form-control" placeholder="color code here">
                                </div>
                                <div class="col-md-1">
                                    <input
                                        value="{{ old('stamp_image_color') ?? ($pass->stamp_image_color ?? 'rgb(255,255,255)') }}"
                                        type="color" id="stamp_image_color_picker"
                                        onchange="updateColorValueOfId('stamp_image_color_picker','stamp_image_color','stamped')"
                                        class="form-control form-control-color">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="text_color" class="mb-3">{{ __('Unstamped Image') }}</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input name="unstamp_image_color" id="unstamp_image_color"
                                        value="{{ old('unstamp_image_color') ?? ($pass->unstamp_image_color ?? 'rgb(255,255,255)') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <input
                                        value="{{ old('unstamp_image_color') ?? ($pass->unstamp_image_color ?? 'rgb(255,255,255)') }}"
                                        type="color" id="unstamp_image_color_picker"
                                        onchange="updateColorValueOfId('unstamp_image_color_picker','unstamp_image_color','unstamped')"
                                        class="form-control form-control-color">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-4">
                <button type="button"
                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 bg-white text-black"
                    data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                    aria-controls="accordion-collapse-body-4">
                    <span>{{ __('Reward') }}</span>
                    @error('stamps_color')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    @error('stamps_border_color')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </button>
            </h2>
            <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                <div class="rounded-[10px] p-2 border border-t-0 border-gray-200 dark:border-gray-700">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="theme_color" class="mb-3">{{ __('Reward Background') }}</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input name="reward_bg_color" id="reward_bg_color" value="rgb(255,0,0)"
                                        class="form-control" placeholder="color code here">
                                </div>
                                <div class="col-md-1">
                                    <input type="color" id="reward_bg_color_picker" value="rgb(255,0,0)"
                                        onchange="updateBgColorValueOfId('reward_bg_color_picker','reward_bg_color','circle')"
                                        class="form-control form-control-color">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="theme_color" class="mb-3">{{ __('Reward Border') }}</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input name="reward_border_color" id="reward_border_color" class="form-control"
                                        value="rgb(0,255,0)" placeholder="color code here">
                                </div>
                                <div class="col-md-1">
                                    <input type="color" id="reward_border_color_picker" value="rgb(0,255,0)"
                                        onchange="updateBorderColorValueOfId('reward_border_color_picker','reward_border_color','circle')"
                                        class="form-control form-control-color">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 id="accordion-collapse-heading-5">
                <button type="button"
                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3 bg-white text-black"
                    data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span>{{ __('Qr Code') }}</span>
                    @error('qr_type')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </button>
            </h2>
            <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
                <div class="rounded-[10px] p-2 border border-t-0 border-gray-200 dark:border-gray-700">

                    @include('loyality.qr_code')
                </div>
            </div>
        </div>

        <div id="multi_reward">
            <div class="card mt-3">
                <div class="card-body">
                    <div id="multi_reward_msg">{{ __('Please select stamps') }}</div>
                    <table id="multi_reward_input" class="table table-hover">
                        <thead>
                            <th colspan="2" class="rounded-lg border-none text-white"
                                style="background-color: #7400b8;">{{ __('Stamp #') }}</th>
                        </thead>
                        <tr id="reward_input">
                            <td>
                                <select class="reward_options form-control" name="reward_at_stamp_no[]"
                                    onchange="rander_rewarded_stamps()">
                                </select>
                            </td>
                        </tr>
                        <tbody id="selected_rewards">
                        </tbody>
                    </table>
                    <span id="multi_reward_input_add_button"
                        class="btn btn-success float-end flex items-center justify-center" onclick="addReward()"><i
                            class='bx bx-plus text-[18px]'></i></span>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
