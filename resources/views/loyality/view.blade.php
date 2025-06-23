@extends('admin-v2.layouts.dashboard')
@section('title', 'View Library')
@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="pagetitle">
    <h1>View Library</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">View Library</li>
        </ol>
    </nav>
</div>

<section class="section view_library">
    <div class="row">
        <div class="col-lg-12">
            <div class="all_libraries d-flex gap-5 flex-wrap">
                @foreach($libraries as $item )
                <div class="singleLibrary">
                    <div class="relative border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-xl">
                        <div
                            class="w-[148px] h-[18px] bg-gray-800 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute">
                        </div>
                        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg"></div>
                        <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg"></div>
                        <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg"></div>
                        <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">
                                <div id="cofee_temp">
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

                                                <div class="front_card coupon_card_2  rounded-[12px] box" style="background-color: {{ $item->card_bg_color ?? '#000000' }}">
                                                <div class="flex justify-between items-center px-[10px]">
                                                    <div class=" w-[87px] h-[87px] flex items-center relative hello">
                                                        <img src="{{asset($item->logo_image ?? '/img/logo_white.png')}}" alt="" class="img-logo img-fluid absolute w-[100%] h-[100%]" >
                                                    </div>

                                                    <div>
                                                    <p class="header_label text-[14px] text-right font-[500] leading-normal change_input card_text" style="color: {{ $item->card_txt_color ?? 'rgb(255,255,255)' }}">{{ isset($item->header_fields) ? json_decode($item->header_fields)[0]->label ?? '':'STAMPS' }}</p>
                                                    <p class="header_value text-[17px] text-right font-[500] card_text" style="color: {{ $item->card_txt_color ?? 'rgb(222,222,222)' }}">{{ isset($item->header_fields) ? json_decode($item->header_fields)[0]->value ?? '':'1/$item->no_of_stamps' }}</p>
                                                    </div>
                                                </div>


                                                <div class="w-full h-[108px] bg-center bg-no-repeat bg-cover p-[5px] flex items-center relative" style="background-color: {{ $item->strip_bg_color ?? '#ffffff' }}">

                                                <div class="customSelectWrapper" bis_skin_checked="1">
                                                    <div class="customSelect" bis_skin_checked="1" style="background-color: rgb(211, 167, 217); background-repeat: no-repeat; background-position: center center; background-size: cover; object-fit: contain;">
                                                        <img src="{{$item->strip_bg_image}}">
                                                    </div>
                                                </div>
                                                </div>

                                    <div class="p-[10px] ">
                                        <div class="flex justify-between items-center">
                                            <div class="flex flex-col gap-[5px]">
                                                <p class="secondary_label_1 text-left text-[8px] font-[400] card_text" id="first_label_value" style="color: {{ $item->card_txt_color ?? 'rgb(255,255,255)' }}">

                                                {{isset($item->secondary_fields) ? json_decode($item->secondary_fields)[0]->label ?? '':'STAMPS REQUIRED UNTIL NEXT REWARD' }}
                                                </p>
                                                <P class="secondary_value_1 text-left text-[23px] font-[300] card_text" style="color: {{ $item->card_txt_color ?? 'rgb(222,222,222)' }}">{{isset($item->secondary_fields) ? json_decode($item->secondary_fields)[0]->value ?? '':'10' }}</P>
                                            </div>

                                            <div class="flex flex-col gap-[5px]">
                                                <p class="secondary_label_2 text-right text-[8px] font-[400] card_text" id="second_label_value" style="color: {{ $item->card_txt_color ?? 'rgb(255,255,255)' }}">
                                                    {{isset($item->secondary_fields) ? json_decode($item->secondary_fields)[1]->label ?? '':'' }}
                                                </p>
                                                <P class="secondary_value_2 text-right text-[23px] font-[300] card_text" style="color: {{ $item->card_txt_color ?? 'rgb(222,222,222)' }}">{{isset($item->secondary_fields) ? json_decode($item->secondary_fields)[1]->value ?? '':'' }}</P>
                                            </div>

                                        </div>


                                        <div class="text-center"
                                                style="width:160px; margin:0 auto; margin-top:40px;">

                                                @isset($item->qr_type)
                                                @switch($item->qr_type)
                                                    @case('qr_code')
                                                        <img src="{{ asset('img/qr_A.png') }}"
                                                            class="img-fluid mx-auto barcode_img_2">
                                                        @break
                                                    @case('aztec')
                                                        <img src="{{ asset('img/qr_B.png') }}"
                                                            class="img-fluid mx-auto barcode_img_2">
                                                        @break
                                                    @case('pdf_417')
                                                        <img src="{{ asset('img/b1.png') }}"
                                                            class="img-fluid mx-auto barcode_img_2">
                                                        @break
                                                    @case('code_128')
                                                        <img src="{{ asset('img/b2.png') }}"
                                                            class="img-fluid mx-auto barcode_img_2">
                                                        @break

                                                    @default
                                                    <img src="{{ asset('img/b2.png') }}"
                                                        class="img-fluid mx-auto barcode_img_2">
                                                @endswitch
                                                @else
                                                <img src="{{ asset('img/qr_A.png') }}" class="img-fluid mx-auto barcode_img_2">
                                                @endisset
                                            </div>

                                        </div>
                                    </div>

                                        </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="flex items-center justify-center gap-5 card_action_bar" style="position: absolute; bottom: 30px; background: #ffff; width: 100%;">
                                <div class="w-[3.5rem] h-[3.5rem] rounded-full flex justify-center items-center cursor-pointer" bis_skin_checked="1" style="background-color: rgb(237, 239, 240);"><svg onclick="deleteLibraryPass({{$item->id}})" width="20" height="20" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 1.00001H9.75L9.45625 0.41563C9.39402 0.290697 9.29817 0.185606 9.17947 0.11218C9.06077 0.0387537 8.92394 -9.46239e-05 8.78437 5.47897e-06H5.2125C5.07324 -0.00052985 4.93665 0.0381736 4.81837 0.111682C4.7001 0.18519 4.60492 0.290529 4.54375 0.41563L4.25 1.00001H0.5C0.367392 1.00001 0.240215 1.05268 0.146447 1.14645C0.0526784 1.24022 0 1.3674 0 1.5L0 2.5C0 2.63261 0.0526784 2.75979 0.146447 2.85356C0.240215 2.94733 0.367392 3 0.5 3H13.5C13.6326 3 13.7598 2.94733 13.8535 2.85356C13.9473 2.75979 14 2.63261 14 2.5V1.5C14 1.3674 13.9473 1.24022 13.8535 1.14645C13.7598 1.05268 13.6326 1.00001 13.5 1.00001ZM1.6625 14.5938C1.68635 14.9746 1.85442 15.332 2.13252 15.5932C2.41061 15.8545 2.77781 16 3.15937 16H10.8406C11.2222 16 11.5894 15.8545 11.8675 15.5932C12.1456 15.332 12.3136 14.9746 12.3375 14.5938L13 4H1L1.6625 14.5938Z" fill="#677781"></path></svg></div>
                            </div>
                        </div>


                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    const deleteLibraryPass = async (id) => {
            let successText = 'Pass has been deleted';
            Swal.fire({
                title: 'Are you sure?',
                text: "You can be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Delete`
            }).then(async (result) => {
                if (result.isConfirmed) {
                    let url = "/admin/library/delete"
                    const res = await $.post(`${url}`, {
                        library_id: id
                    });

                    Swal.fire(
                        'Success',
                        `${successText}`,
                        'success'
                    )
                    location.reload()

                    


                }
            })
        }
</script>