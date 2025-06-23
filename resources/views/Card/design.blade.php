@extends('layouts.user-dashboard')
@section('content')
    <section id="services" class="services">
        <div class="container-fluid p-0" data-aos="fade-up">
            {{-- Navigation Start --}}
            <div class="sticky top-0 z-50 bg-[#f8f8f8]">
                <div class="d-flex justify-content-between">
                  <div class="flex gap-1 px-3 nav-tabs">
                    <div class="flex items-center justify-center focus-within:bg-[#e7e7e7]">
                      <i class="bx bxs-palette header-icon"></i>
                      <a
                        href="#tab-1"
                        class="flex gap-[3px] items-center cursor-pointer p-2  font-[300] text-base nav hover:text-[#212529]">
                        {{ __('Design') }}
                      </a>
                    </div>
                    <div class="flex items-center justify-center focus-within:bg-[#e7e7e7]">
                        <button type="submit" form="design_from" class="flex items-center justify-center focus-within:bg-[#e7e7e7]">
                        <i class="bi bi-card-list header-icon"></i>
                          <a
                          href="#tab-2"
                          class="flex gap-[5px] items-center cursor-pointer p-2 focus-within:bg-[#e7e7e7] font-[300] text-base nav hover:text-[#212529]" id="details__btn">
                          {{ __('Details') }}
                        </a>
                        </button>
                    </div>
                    <div class="flex items-center justify-center focus-within:bg-[#e7e7e7]">
                        <button type="submit" form="design_from" class="flex items-center justify-center focus-within:bg-[#e7e7e7]">
                        <i class="bx bx-file header-icon"></i>
                          <a
                            href="#tab-3"
                            class="flex gap-[5px] items-center cursor-pointer p-2 focus-within:bg-[#e7e7e7] font-[300] text-base nav hover:text-[#212529]">
                            {{ __('Fields') }}
                          </a>
                          
                        </button>
                      </div>
                  </div>
                </div>
            </div>
            {{-- Navigation End --}}

            {{-- Main body Start --}}
            <div class="container ml-0 h-[83vh] mt-1">
                <div class="d-flex gap-[13px] relative " id="apple_div">
            {{-- Form Section Start --}}
                    <div class="col-12 col-lg-8 h-[84vh] overflow-y-auto scrollbar-hidden">
                    
                        <form id="design_from" action="{{route('pass.storeDesign')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="p-[10px]">
                                    <div class="flex gap-[5px] py-2">
                                        <i class='bx bxl-vimeo text-[20px]'></i>
                                        <a href="#" class="text-[#23527c]">{{ __('Watch video tutorial') }} : {{ __('Designing your Card') }}</a>
                                    </div>
                            
                                <div>
                                    <div class="container mb-3">
                                        <div class="form-group">
                                            <div class="flex items-center gap-[5px] py-3">
                                                <h3 class="text-[1.1em] font-[600]">{{ __('Type') }} </h3>
                                                <i class='bx bxs-info-circle text-[18px] '></i>
                                            </div>
                            
                                            <div class="mt-4">
                                                <label class="radio-choice ng-binding text-[14px] font-[400]">
                                                    <input
                                                        type="radio"
                                                        name="reward_type"
                                                        onchange="reward_type_check()"
                                                        {{old('reward_type') == 'single' ? 'checked':'checked'}}
                                                        {{isset($pass->reward_type) ? $pass->reward_type == 'single' ? 'checked':'checked' : ''}}
                                                        value="single"
                                                    >
                                                    {{ __('Single Reward') }}
                                                </label>
                                                <br />
                                                <label class="radio-choice ng-binding text-[14px] font-[400]">
                                                    <input
                                                        type="radio"
                                                        name="reward_type"
                                                        onchange="reward_type_check()"
                                                        {{old('reward_type') == 'multi' ? 'checked':''}}
                                                        {{isset($pass->reward_type) ? $pass->reward_type == 'multi' ? 'checked':'' : ''}}
                                                        value="multi"
                                                        >
                                                    {{ __('Multi Reward') }}
                                                </label>
                                            </div>
                                            @error('reward_type')
                                                <div class="text-red-600">{{$message}}</div>
                                            @enderror
                            
                                            <hr class="mt-[40px] text-[#f74780]" />
                            
                                            <h3 class="text-[18px] font-[600] py-3">{{ __('Images') }}</h3>
                                            <div id="stamp_area" class="fixed hero-bg flex flex-wrap items-center justify-center gap-[8px] h-[108px] w-[240px] z-[-1]">
                                                </div>
                                            <!-- image  -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="flex items-center gap-[5px] py-1">
                                                        <p class="text-[15px] font-[500]"> {{ __('Logo') }}</p>
                                                        <i class='bx bxs-info-circle text-[18px]'></i>
                                                    </div>
                                                    <label for="logo_image" class="logo_img max-w-full rounded-md" id="logo_image_box">
                                                            <img src="{{ asset($pass->logo_image ?? 'img/logo.png') }}" alt="" class="img-fluid img-logo">
                                                            <div class="middle-logo">
                                                                {{ __('CHOOSE IMAGE') }}
                                                            </div>
                                                    </label>
                            
                                                    <input type="file" name="logo_image" id="logo_image" onchange="changeBgImage('logo_image','img-logo')" class="form-control d-none">
                                                    <p class="text-[0.7rem] font-[300]">{{ __('Recommended size: 87x87 pixels. Must be square.') }}</p>
                                                    @error('logo_image')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                </div>
                            
                                                <div class="col-md-6">
                                                    <div class="flex items-center gap-[5px] py-1">
                                                        <p class="text-[15px] font-[500]"> {{ __('Icon') }}</p>
                                                        <i class='bx bxs-info-circle text-[18px]'></i>
                                                    </div>
                                                    <label for="icon_image" class="logo_img max-w-full rounded-md" id="icon_image_box">
                                                            <img src="{{ asset($pass->icon_image ?? 'img/logo.png') }}" alt="" class="img-fluid icon-logo">
                                                            <div class="middle-logo">
                                                                {{ __('CHOOSE IMAGE') }}
                                                            </div>
                                                    </label>
                            
                                                    <input type="file" name="icon_image" id="icon_image" onchange="changeBgImage('icon_image','icon-logo')" class="form-control d-none">
                                                    <p class="text-[0.7rem] font-[300]">{{ __('Recommended size: 87x87 pixels. Must be square.') }}</p>
                                                    @error('icon_image')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                            
                                        <hr class="mt-5 text-[#f74780]" />
                            
                                        <div class="flex flex-col gap-[30px]">
                                            <h3 class="pt-3 font-[600] flex items-center gap-[2px]">
                                                {{ __('Stamps') }}
                                                <span uib-tooltip="The total number of stamps you want on your card."
                                                    tooltip-placement="right"></span>
                                                <i class='bx bxs-info-circle text-[18px]'></i>
                                            </h3>
                                            <select onchange="rander_stamps(this.value)" name="no_of_stamps" class="form-control p-3 text-[#a7a7a7] cursor-pointer hideArrow">
                                                <option value="1" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '1' ? 'selected':'':''}}>1 {{ __('stamp') }}</option>
                                                <option value="2" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '2' ? 'selected':'':''}}>2 {{ __('stamps') }}</option>
                                                <option value="3" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '3' ? 'selected':'':''}}>3 {{ __('stamps') }}</option>
                                                <option value="4" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '4' ? 'selected':'':''}}>4 {{ __('stamps') }}</option>
                                                <option value="5" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '5' ? 'selected':'':''}}>5 {{ __('stamps') }}</option>
                                                <option value="6" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '6' ? 'selected':'':''}}>6 {{ __('stamps') }}</option>
                                                <option value="7" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '7' ? 'selected':'':''}}>7 {{ __('stamps') }}</option>
                                                <option value="8" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '8' ? 'selected':'':''}}>8 {{ __('stamps') }}</option>
                                                <option value="9" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '9' ? 'selected':'':''}}>9 {{ __('stamps') }}</option>
                                                <option value="10" {{isset($pass->no_of_stamps) ? $pass->no_of_stamps == '10' ? 'selected':'':''}}>10 {{ __('stamps') }}</option>
                                            </select>
                                            @error('no_of_stamps')
                                                <div class="text-red-600">{{$message}}</div>
                                            @enderror
                                        </div>
                            
                                        <div class="my-3 flex flex-col gap-3 md:flex-row md:justify-between">
                                            <div class="col-md-5 bg-[#f8f8f8] rounded-lg p-2">
                                                <p class="text-[14px] font-[400] py-2">{{ __('Pick Stamped Icon') }}</p>
                                                <div class="flex justify-center md:justify-between items-center flex-col md:flex-row">
                                                    <select name="picked_stamps_icon" class="form-control rounded-md pe-5 overflow-x-auto w-[100%] text-[#a7a7a7] cursor-pointer" onchange="addClassInClassStamp('stamped',this.value)">
                                                        <option value="">Select one</option>
                                                        <option value="bi bi-cup" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-cup' ? 'selected':'':''}}>bi bi-cup</option>
                                                        <option value="bi bi-cup-hot-fill" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-cup-hot-fill' ? 'selected':'':''}}>bi bi-cup-hot-fill</option>
                                                        <option value="bi bi-cup-fill" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-cup-fill' ? 'selected':'':''}}>bi bi-cup-fill</option>
                                                        <option value="bi bi-bookmark-check-fill" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-bookmark-check-fill' ? 'selected':'':''}}>bi bi-bookmark-check-fill</option>
                                                        <option value="bi bi-book-fill" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-book-fill' ? 'selected':'':''}}>bi bi-book-fill</option>
                                                        <option value="bi bi-circle-square" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-circle-square' ? 'selected':'':''}}>bi bi-circle-square</option>
                                                        <option value="bi bi-arrow-up" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-arrow-up' ? 'selected':'':''}}>bi bi-arrow-up</option>
                                                        <option value="bi bi-arrow-down" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-arrow-down' ? 'selected':'':''}}>bi bi-arrow-down</option>
                                                        <option value="bi bi-check" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-check' ? 'selected':'':''}}>bi bi-check</option>
                                                        <option value="bi bi-x" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-x' ? 'selected':'':''}}>bi bi-x</option>
                                                        <option value="bi bi-heart" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-heart' ? 'selected':'':''}}>bi bi-heart</option>
                                                        <option value="bi bi-star" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-star' ? 'selected':'':''}}>bi bi-star</option>
                                                        <option value="bi bi-person" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-person' ? 'selected':'':''}}>bi bi-person</option>
                                                        <option value="bi bi-envelope" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-envelope' ? 'selected':'':''}}>bi bi-envelope</option>
                                                        <option value="bi bi-telephone" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-telephone' ? 'selected':'':''}}>bi bi-telephone</option>
                                                        <option value="bi bi-gear" {{isset($pass->picked_stamps_icon) ? $pass->picked_stamps_icon == 'bi bi-gear' ? 'selected':'':''}}>bi bi-gear</option>
                            
                                                    </select>
                                                    <div class="w-[100%] md:w-[50%] p-2 md:p-5" style='font-size:75px'>
                                                        <div class="stamped_display flex items-center justify-center">
                                                            <i class="{{$pass->picked_stamps_icon ?? ''}}"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="w-full flex justify-center items-center gap-[15px] max-w-[100%]">
                                                    <div class="w-full h-[1px] bg-[#C6C7C9]"></div>
                                                    <p class="whitespace-nowrap text-[#4C525E]">OR</p>
                                                    <div class="w-full bg-[#C6C7C9] h-[1px]"></div>
                                                </div>
                                                <p>Upload Stamped Image</p>
                                                <div>
                                                    <div class=" max-w-full mx-auto" id="stamped_image">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAYJJREFUSEvt1r9OVUEQx/EPJlrQ6BOIFLRAjNKiVHSUJNBQUQMPoIK1Ud9AC6l5AyCEGgghVCTUFiY2JiQayJA9yeZy/+zlnBskuslpTmbnu7+Z2Zkdckdr6I64/irwCEZrRuIHjnHZyU+u+AE2MV8TWm0/wCy+t/OXgxfwrSFo5eYzVnqB32A9Gb2ueYBPmMA2ZnqB3+FtMqpbdDuYxi5e/QdHBPKQ3ptQT+ECR21yOLAcP0Hc0594gd8t8MbAj/AnfcHYwlyCxTV8Pyhw3MtQ+DU1hI8ZKNSO4zT714jiUBYKz7CIPTxsURh5bhfyjn2oV1U/wyEeJw+/MNzBWzSfjdKO1w0cqvbxstBZHvIlxKHP8aXfzhVDY7kQmk+kVTSS4z7Z1+b3A7yGD0leTJWSVU2eyGl81ZpMBRkNJoqzWpHv65znxTWGkzZXpdsBqv15n+9mH/M+bG889p6nBvG0RG42a2spLmQVmfVVXEUeC43+PXBfnaswis2Y1X1N3voUVyIiYh//GiIHAAAAAElFTkSuQmCC"
                                                            class="w-[35px] h-[35px]" />
                            
                                                        <img src="{{ asset(' storage /' . $pass->logo_image ?? 'img/logo.png') }}" alt=""
                                                            class="img-fluid img-logo">
                                                        <div class="middle-logo">
                                                            CHOOSE IMAGE
                                                        </div>
                                                    </div>
                                                    <input type="file" name="picked_stamps_image" class="form-control d-none">
                                                    <p class="text-[0.7rem] font-[300]">Minimum square resolution of 200 x 200 px</p>
                                                </div> --}}
                                                @error('picked_stamps_image')
                                                    <div class="text-red-600">{{$message}}</div>
                                                @enderror
                                            </div>
                            
                                            <div class="col-md-5 bg-[#f8f8f8] rounded-lg p-2">
                                                <p class="text-[14px] font-[400] py-2">{{ __('Pick Unstamped Icon') }}</p>
                                                <div class="flex justify-center md:justify-between items-center flex-col md:flex-row">
                                                    <select name="un_stamps_icon" class="form-control rounded-md pe-5 overflow-x-auto w-[100%] text-[#a7a7a7] cursor-pointer" onchange="addClassInClassUnstamp('unstamped',this.value)">
                                                        <option value="">Select one</option>
                                                        <option value="bi bi-cup" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-cup' ? 'selected':'':''}}>bi bi-cup</option>
                                                        <option value="bi bi-cup-hot-fill" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-cup-hot-fill' ? 'selected':'':''}}>bi bi-cup-hot-fill</option>
                                                        <option value="bi bi-cup-fill" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-cup-fill' ? 'selected':'':''}}>bi bi-cup-fill</option>
                                                        <option value="bi bi-bookmark-check-fill" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-bookmark-check-fill' ? 'selected':'':''}}>bi bi-bookmark-check-fill</option>
                                                        <option value="bi bi-book-fill" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-book-fill' ? 'selected':'':''}}>bi bi-book-fill</option>
                                                        <option value="bi bi-circle-square" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-circle-square' ? 'selected':'':''}}>bi bi-circle-square</option>
                                                        <option value="bi bi-arrow-up" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-arrow-up' ? 'selected':'':''}}>bi bi-arrow-up</option>
                                                        <option value="bi bi-arrow-down" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-arrow-down' ? 'selected':'':''}}>bi bi-arrow-down</option>
                                                        <option value="bi bi-check" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-check' ? 'selected':'':''}}>bi bi-check</option>
                                                        <option value="bi bi-x" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-x' ? 'selected':'':''}}>bi bi-x</option>
                                                        <option value="bi bi-heart" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-heart' ? 'selected':'':''}}>bi bi-heart</option>
                                                        <option value="bi bi-star" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-star' ? 'selected':'':''}}>bi bi-star</option>
                                                        <option value="bi bi-person" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-person' ? 'selected':'':''}}>bi bi-person</option>
                                                        <option value="bi bi-envelope" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-envelope' ? 'selected':'':''}}>bi bi-envelope</option>
                                                        <option value="bi bi-telephone" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-telephone' ? 'selected':'':''}}>bi bi-telephone</option>
                                                        <option value="bi bi-gear" {{isset($pass->un_stamps_icon) ? $pass->un_stamps_icon == 'bi bi-gear' ? 'selected':'':''}}>bi bi-gear</option>
                                                    </select>
                                                    <div class="w-[100%] md:w-[50%] p-2 md:p-5" style='font-size:75px'>
                                                        <div class="unstamped_display flex items-center justify-center">
                                                            <i class="{{$pass->un_stamps_icon ?? ''}}"></i>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                {{-- <div class="w-full flex justify-center items-center gap-[15px] max-w-[100%]">
                                                    <div class="w-full h-[1px] bg-[#C6C7C9]"></div>
                                                    <p class="whitespace-nowrap text-[#4C525E]">OR</p>
                                                    <div class="w-full bg-[#C6C7C9] h-[1px]"></div>
                                                </div>
                                                <p>Upload Stamped Image</p>
                                                <div>
                                                    <div class=" max-w-full mx-auto" id="stamped_image">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAYJJREFUSEvt1r9OVUEQx/EPJlrQ6BOIFLRAjNKiVHSUJNBQUQMPoIK1Ud9AC6l5AyCEGgghVCTUFiY2JiQayJA9yeZy/+zlnBskuslpTmbnu7+Z2Zkdckdr6I64/irwCEZrRuIHjnHZyU+u+AE2MV8TWm0/wCy+t/OXgxfwrSFo5eYzVnqB32A9Gb2ueYBPmMA2ZnqB3+FtMqpbdDuYxi5e/QdHBPKQ3ptQT+ECR21yOLAcP0Hc0594gd8t8MbAj/AnfcHYwlyCxTV8Pyhw3MtQ+DU1hI8ZKNSO4zT714jiUBYKz7CIPTxsURh5bhfyjn2oV1U/wyEeJw+/MNzBWzSfjdKO1w0cqvbxstBZHvIlxKHP8aXfzhVDY7kQmk+kVTSS4z7Z1+b3A7yGD0leTJWSVU2eyGl81ZpMBRkNJoqzWpHv65znxTWGkzZXpdsBqv15n+9mH/M+bG889p6nBvG0RG42a2spLmQVmfVVXEUeC43+PXBfnaswis2Y1X1N3voUVyIiYh//GiIHAAAAAElFTkSuQmCC"
                                                            class="w-[35px] h-[35px]" />
                            
                                                        <img src="{{ asset(' storage /' . $pass->logo_image ?? 'img/logo.png') }}" alt=""
                                                            class="img-fluid img-logo">
                                                        <div class="middle-logo">
                                                            CHOOSE IMAGE
                                                        </div>
                                                    </div>
                                                    <input type="file" name="un_stamps_image" class="form-control d-none">
                                                    <p class="text-[0.7rem] font-[300]">Minimum square resolution of 200 x 200 px</p>
                                                </div>
                                                <div class="w-full flex justify-center items-center gap-[15px] max-w-[100%]">
                                                    <div class="w-full h-[1px] bg-[#C6C7C9]"></div>
                                                    <p class="whitespace-nowrap text-[#4C525E]">OR</p>
                                                    <div class="w-full bg-[#C6C7C9] h-[1px]"></div>
                                                </div>
                                                <div class="flex justify-between items-center">
                                                    <p class="font-[600] text-[14px]">Use Stamped Image </p>
                                                    <div class="flipswitch">
                                                        <input type="checkbox" class="flipswitch-cb" id="fs" checked>
                                                        <label class="flipswitch-label" for="fs">
                                                            <div class="flipswitch-inner"></div>
                                                            <div class="flipswitch-switch"></div>
                                                        </label>
                                                    </div>
                            
                                                </div> --}}
                                                @error('un_stamps_image')
                                                    <div class="text-red-600">{{$message}}</div>
                                                @enderror
                                            </div>
                            
                                            <br>
                            
                                        </div>
                            
                                        <div class="row gap-3">
                                            <div class="col-md-5 bg-[#f8f8f8] rounded-lg p-2">
                                                <div class="flex items-center gap-[5px] py-1">
                                                    <p class="text-[15px] font-[500]"> {{ __('Pick Stamped Image') }}</p>
                                                    <i class='bx bxs-info-circle text-[18px]'></i>
                                                </div>
                                                <label for="picked_stamps_image" class="logo_img max-w-full rounded-md" id="picked_stamps_image_box">
                                                        <img src="{{ asset($pass->picked_stamps_image ?? 'img/logo.png') }}" alt="" class="img-fluid img-stamped">
                                                        <div class="middle-logo">
                                                            {{ __('CHOOSE IMAGE') }}
                                                        </div>
                                                </label>
                            
                                                <input type="file" name="picked_stamps_image" id="picked_stamps_image" onchange="changeBgImage('picked_stamps_image','img-stamped')" class="form-control d-none">
                                                <p class="text-[0.7rem] font-[300]">{{ __('Recommended size: 87x87 pixels. Must be square.') }}</p>
                                                @error('picked_stamps_image')
                                                    <div class="text-red-600">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-5 ml-11 bg-[#f8f8f8] rounded-lg p-2">
                                                <div class="flex items-center gap-[5px] py-1">
                                                    <p class="text-[15px] font-[500]"> {{ __('Pick Un-stamped Image') }}</p>
                                                    <i class='bx bxs-info-circle text-[18px]'></i>
                                                </div>
                                                <label for="un_stamps_image" class="logo_img max-w-full rounded-md" id="un_stamps_image_box">
                                                        <img src="{{ asset($pass->un_stamps_image ?? 'img/logo.png') }}" alt="" class="img-fluid img-unstamp">
                                                        <div class="middle-logo">
                                                            {{ __('CHOOSE IMAGE') }}
                                                        </div>
                                                </label>
                            
                                                <input type="file" name="un_stamps_image" id="un_stamps_image" onchange="changeBgImage('un_stamps_image','img-unstamp')" class="form-control d-none">
                                                <p class="text-[0.7rem] font-[300]">{{ __('Recommended size: 87x87 pixels. Must be square.') }}</p>
                                                @error('un_stamps_image')
                                                    <div class="text-red-600">{{$message}}</div>
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
                                                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                                                    aria-controls="accordion-collapse-body-1">
                                                    <span>{{ __('Card') }}</span>
                                                    @error('card_txt_color')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                    @error('card_bg_color')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                </button>
                                            </h2>
                                            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                                                <div class="rounded-[10px] p-2 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                    <div class="flex justify-start">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="theme_color" class="mb-3">{{ __('Background') }}</label>
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <input
                                                                            name="card_bg_color"
                                                                            id="card_bg_color"
                                                                            value="{{old('card_bg_color') ?? $pass->card_bg_color ?? 'rgb(0,0,0)' }}"
                                                                            class="form-control"
                                                                            placeholder="color code here">
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <input
                                                                            type="color"
                                                                            id="card_bg_color_picker"
                                                                            onchange="updateBgColorValueOfId('card_bg_color_picker','card_bg_color','front_card')"
                                                                            value="{{old('card_bg_color') ?? $pass->card_bg_color ?? 'rgb(0,0,0)'}}"
                                                                            class="form-control form-control-color">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="text_color" class="mb-3">{{ __('Text') }}</label>
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <input
                                                                            name="card_txt_color"
                                                                            id="card_txt_color"
                                                                            value="{{old('card_txt_color') ?? $pass->card_txt_color ?? 'rgb(255,255,255)' }}"
                                                                            class="form-control"
                                                                            placeholder="color code here">
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <input
                                                                            type="color"
                                                                            id="card_txt_color_picker"
                                                                            onchange="updateColorValueOfId('card_txt_color_picker','card_txt_color','card_text')"
                                                                            value="{{old('card_txt_color')  ?? $pass->card_txt_color ?? 'rgb(255,255,255)' }}"
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
                                                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                                    aria-controls="accordion-collapse-body-2">
                                                    <span>{{ __('Strip Background') }}</span>
                                                    @error('strip_bg_image')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                    @error('strip_bg_color')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                </button>
                                            </h2>
                                            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                                                <div class="rounded-[10px] p-2 border border-b-0 border-gray-200 dark:border-gray-700">
                                                    <div class="flex justify-start">
                                                        <div class="row">
                                                            <label for="theme_color" class="mb-3">{{ __('Strip Background') }}</label>
                                                            <div class="col-md-6">
                                                                <input
                                                                    name="strip_bg_color"
                                                                    id="strip_bg_colorr"
                                                                    value="{{ old('strip_bg_color') ?? $pass->strip_bg_color ?? 'rgb(255,255,255)' }}"
                                                                    class="form-control"
                                                                    placeholder="color code here">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <input
                                                                            value="{{ old('strip_bg_color') ?? $pass->strip_bg_color ?? 'rgb(255,255,255)' }}"
                                                                            type="color"
                                                                            id="strip_bg_color_picker"
                                                                            onchange="updateBgColorValueOfId('strip_bg_color_picker','strip_bg_colorr','hero-bg')"
                                                                            class="form-control form-control-color">
                                                                    </div>
                                                                    <div class="col-md-10 mt-2">
                                                                        <div class="col-md-12 bg-[#f8f8f8] rounded-lg">
                                                                            <div class="flex items-center py-1">
                                                                                <p class="text-[15px] font-[500]"> {{ __('Pick Image') }}</p>
                                                                                <i class='bx bxs-info-circle text-[18px]'></i>
                                                                            </div>
                                                                            <label for="change_strip_bg_image" class="logo_img max-w-full rounded-md" id="change_strip_bg_image_box">
                                                                                    <img src="{{ asset($pass->change_strip_bg_image ?? 'img/logo.png') }}" alt="" class="img-fluid img-unstamped">
                                                                                    <div class="middle-logo">
                                                                                        {{ __('CHOOSE IMAGE') }}
                                                                                    </div>
                                                                            </label>
                            
                                                                            <input type="file" name="change_strip_bg_image" id="change_strip_bg_image" onchange="updateBgImage(this)" class="form-control d-none">
                                                                            <p class="text-[0.8rem] font-[250]">{{ __('Recommended size: 87x87 pixels. Must be square.') }}</p>
                                                                            @error('change_strip_bg_image')
                                                                                <div class="text-red-600">{{$message}}</div>
                                                                            @enderror
                                                                        </div>
                                                                        {{-- <input type="file" name="change_strip_bg_image" class="form-control" onchange="updateBgImage(this)" /> --}}
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
                                                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                                                    aria-controls="accordion-collapse-body-3">
                                                    <span>{{ __('Stamp Circle') }}</span>
                                                    @error('stamps_color')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                    @error('stamps_border_color')
                                                        <div class="text-red-600">{{$message}}</div>
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
                                                                    <input
                                                                        name="stamps_color"
                                                                        id="stamps_color"
                                                                        value="{{old('stamps_color')  ?? $pass->stamps_color ?? 'rgb(255,255,255)' }}"
                                                                        class="form-control"
                                                                        placeholder="color code here">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input
                                                                        value="{{old('stamps_color')  ?? $pass->stamps_color ?? 'rgb(255,255,255)' }}"
                                                                        type="color"
                                                                        id="stamps_color_picker"
                                                                        onchange="updateBgColorValueOfId('stamps_color_picker','stamps_color','circle')"
                                                                        class="form-control form-control-color">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="text_color" class="mb-3">{{ __('Circle Border') }}</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <input
                                                                        name="stamps_border_color"
                                                                        id="stamps_border_color"
                                                                        value="{{old('stamps_border_color')  ?? $pass->stamps_border_color ?? 'rgb(255,255,255)' }}"
                                                                    class="form-control">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input
                                                                        value="{{old('stamps_border_color')  ?? $pass->stamps_border_color ?? 'rgb(255,255,255)' }}"
                                                                        type="color"
                                                                        id="stamps_border_color_picker"
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
                                                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                                    data-accordion-target="#accordion-collapse-body-3-1" aria-expanded="false"
                                                    aria-controls="accordion-collapse-body-3">
                                                    <span>{{ __('Stamp') }}</span>
                                                    @error('stamps_color')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                    @error('stamps_border_color')
                                                        <div class="text-red-600">{{$message}}</div>
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
                                                                    <input
                                                                        name="stamp_image_color"
                                                                        id="stamp_image_color"
                                                                        value="{{old('stamp_image_color')  ?? $pass->stamp_image_color ?? 'rgb(255,255,255)' }}"
                                                                        class="form-control"
                                                                        placeholder="color code here">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input
                                                                        value="{{old('stamp_image_color')  ?? $pass->stamp_image_color ?? 'rgb(255,255,255)' }}"
                                                                        type="color"
                                                                        id="stamp_image_color_picker"
                                                                        onchange="updateBgColorValueOfId('stamp_image_color_picker','stamp_image_color','circle')"
                                                                        class="form-control form-control-color">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="text_color" class="mb-3">{{ __('Unstamped Image') }}</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <input
                                                                        name="unstamp_image_color"
                                                                        id="unstamp_image_color"
                                                                        value="{{old('unstamp_image_color')  ?? $pass->unstamp_image_color ?? 'rgb(255,255,255)' }}"
                                                                    class="form-control">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input
                                                                        value="{{old('unstamp_image_color')  ?? $pass->unstamp_image_color ?? 'rgb(255,255,255)' }}"
                                                                        type="color"
                                                                        id="unstamp_image_color_picker"
                                                                        onchange="updateBorderColorValueOfId('unstamp_image_color_picker','unstamp_image_color','circle')"
                                                                        class="form-control form-control-color">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2 id="accordion-collapse-heading-4">
                                                <button type="button"
                                                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                                    data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                                                    aria-controls="accordion-collapse-body-4">
                                                    <span>{{ __('Reward') }}</span>
                                                    @error('stamps_color')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                    @error('stamps_border_color')
                                                        <div class="text-red-600">{{$message}}</div>
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
                                                                    <input
                                                                        name="reward_bg_color"
                                                                        id="reward_bg_color"
                                                                        value="rgb(255,0,0)"
                                                                        class="form-control"
                                                                        placeholder="color code here">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input
                                                                        type="color"
                                                                        id="reward_bg_color_picker"
                                                                        value="rgb(255,0,0)"
                                                                        onchange="updateBgColorValueOfId('reward_bg_color_picker','reward_bg_color','circle')"
                                                                        class="form-control form-control-color">
                                                                </div>
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-md-6">
                                                            <label for="theme_color" class="mb-3">{{ __('Reward Border') }}</label>
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <input
                                                                        name="reward_border_color"
                                                                        id="reward_border_color"
                                                                        class="form-control"
                                                                        value="rgb(0,255,0)"
                                                                        placeholder="color code here">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input
                                                                        type="color"
                                                                        id="reward_border_color_picker"
                                                                        value="rgb(0,255,0)"
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
                                                    class="rounded-[10px] flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                                    data-accordion-target="#accordion-collapse-body-5" aria-expanded="false"
                                                    aria-controls="accordion-collapse-body-3">
                                                    <span>{{ __('Qr Code') }}</span>
                                                    @error('qr_type')
                                                        <div class="text-red-600">{{$message}}</div>
                                                    @enderror
                                                </button>
                                            </h2>
                                            <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
                                                <div class="rounded-[10px] p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            
                                                    @include('loyality.qr_code')
                                                </div>
                                            </div>
                                        </div>
                            
                                        <div id="multi_reward">
                                            <div class="card mt-3">
                                                <div class="card-body">
                                                    <div id="multi_reward_msg">{{__("Please select stamps")}}</div>
                                                    <table id="multi_reward_input" class="table table-hover">
                                                        <thead>
                                                            <th colspan="2"
                                                            class="rounded-lg border-none text-white"
                                                            style="background-color: #7400b8;"
                                                            >{{__("Stamp #")}}</th>
                                                        </thead>
                                                        <tr id="reward_input">
                                                            <td >
                                                            <select class="reward_options form-control" name="reward_at_stamp_no[]" onchange="rander_rewarded_stamps()">
                                                            </select>
                                                            </td>
                                                        </tr>
                                                        <tbody id="selected_rewards">
                                                        </tbody>
                                                    </table>
                                                    <span id="multi_reward_input_add_button" class="btn btn-success float-end flex items-center justify-center" onclick="addReward()"><i class='bx bx-plus text-[18px]'></i></span>
                                                </div>
                                            </div>
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                            {{-- @include('loyality.settings') --}}
                            {{-- @include('loyality.back_field') --}}

                            {{-- <input type="submit" class="btn btn-success" value="Submit"> --}}
                        </form>
                    </div>
            {{-- Form Section End --}}
                    <!-- {{-- phone --}} -->
                    @include('loyality.phone_layout')
                </div>
            </div>
            {{-- Main body End --}}

        </div>
    </section>

@endsection

@push('script')
    <script src="{{ asset('js/tab_navigation_script.js') }}"></script>
    <script src="{{ asset('js/card_layout_script.js') }}"></script>
@endpush

