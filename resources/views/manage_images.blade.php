@extends('layouts.user-dashboard')
@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title pb-0">
                <h2 class="m-0 pb-1">{{ __('Manage Images') }}</h2>

            </div>
            <div class="container">
                <p>{{ __('Images Required') }}: {{$pass->no_of_stamps + 1}}</p>
                <p>{{ __('Images Created') }}: {{$pass->pass_images->count()}}</p>

                @if ($pass->pass_images->count() == ($pass->no_of_stamps + 1))
                    <div class="alert alert-success">
                        {{ __('Images created now you may proceed to the') }} <a class="btn btn-danger" href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
                    </div>
                @endif

                <form id="image_store" action="{{route('manage.image.store',['id' => $pass->id])}}" method="POST">
                    @csrf
                <div class="flex flex-col gap-4">
                    @for ($x = 0; $x <= $pass->no_of_stamps; $x++)
                        @if (!isset($pass->pass_images[$x]->image))
                            <div class=" h-[108px] bg-center bg-no-repeat bg-cover p-[5px] flex items-center relative" style="width:258px;">
                                <div id={{"stamp_area_".$x}} class="hero-bg flex flex-wrap items-center justify-center gap-[8px] h-[100%] w-full z-0" style="background-color: {{ $pass->strip_bg_color ?? '' }}; background: url({{ $pass->strip_bg_image ?? '' }});  width:258px;">
                                    @for ($y = 1; $y <= $pass->no_of_stamps; $y++)
                                        @if (in_array($y,json_decode($pass->reward_at_stamp_no)))
                                            @if($x < $y)
                                                <div class="circle w-[40px] h-[40px] rounded-[50%] border-[2px] flex justify-center bg-transparant" style="background-color: {{ $pass->reward_bg_color ?? '' }}; border-color: {{ $pass->reward_border_color ?? '' }}; color: {{ $pass->unstamp_image_color ?? '' }}">
                                                    <i class='{{$pass->un_stamps_icon}}' style="margin-top: 4px"></i>
                                                </div>
                                            @else
                                                <div class="circle w-[40px] h-[40px] rounded-[50%] border-[2px] flex justify-center bg-transparant" style="background-color: {{ $pass->reward_bg_color ?? '' }}; border-color: {{ $pass->reward_border_color ?? '' }}; color: {{ $pass->stamp_image_color ?? '' }}">
                                                    <i class='{{$pass->picked_stamps_icon}}' style="margin-top: 4px"></i>
                                                </div>
                                            @endif
                                        @else
                                            @if($x < $y)
                                                <div class="circle w-[40px] h-[40px] rounded-[50%] border-[2px] flex justify-center bg-transparant" style="background-color: {{ $pass->un_stamp_bg_color ?? '' }}; border-color: {{ $pass->stamps_border_color ?? '' }}; color: {{ $pass->unstamp_image_color ?? '' }}">
                                                    <i class='{{$pass->un_stamps_icon}}' style="margin-top: 4px"></i>
                                                </div>
                                            @else
                                                <div class="circle w-[40px] h-[40px] rounded-[50%] border-[2px] flex justify-center bg-transparant" style="background-color: {{ $pass->stamp_bg_color ?? '' }}; border-color: {{ $pass->stamps_border_color ?? '' }}; color: {{ $pass->stamp_image_color ?? '' }}">
                                                    <i class='{{$pass->picked_stamps_icon}}' style="margin-top: 4px"></i>
                                                </div>
                                            @endif
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <span class="btn btn-outline-danger whitespace-nowrap h-[max-content] w-[max-content]" onclick="captureImageForm('image_store','{{'stamp_area_'.$x}}','{{'strip_image_value__'.$x}}', '{{'strip_image_preview_'.$x}}')" style="(  {{($pass->pass_images->count()/($pass->no_of_stamps + 1))*100}}%, #e9ecef  {{($pass->pass_images->count()/($pass->no_of_stamps + 1))*100}}%)">{{ __('Generate Image') }}</span>
                            <input name="data[{{$x}}][stamp_earned]" type="hidden" value="{{$x}}">
                            <input name="data[{{$x}}][image]" type="hidden" class="{{'strip_image_value__'.$x}} generated_images" value="{{$pass->pass_images[$x]->image ?? ''}}">
                            <div class="card max-w-[258px] w-full">
                                <img class="{{'strip_image_preview_'.$x}}  w-full ">
                            </div>
                        @endif

                        @endfor
                </div>
            </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Are you sure') }} !</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ __('Are you sure you want to delete the pass') }} ?
                </div>
                <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button id="delete_button" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function deleteThis(id){
            $('#delete_button').attr("form", id);
        }
    </script>
    <script src="{{ asset('js/card_layout_script.js') }}"></script>
    <script>
        $(document).ready(function(){
            click_to_generate_images();
            checkInputs();
        });

        function click_to_generate_images(){
            var buttons = document.getElementsByClassName("whitespace-nowrap");
            for(var i =0 ; i < buttons.length; i++){
                buttons[i].click();
            }
            // $("#image_store").submit();
        }

        function checkInputs() {
            // Get all input fields with class name "generated_images"
            const inputs = document.querySelectorAll('.generated_images');

            // Check if all input fields are not empty or null
            const allFilled = Array.from(inputs).every(input => input.value.trim() !== '' && input.value !== null);

            if (allFilled) {
                // Submit the form
                document.getElementById('image_store').submit();
            } else {
                // Wait and continue checking after a delay (adjust the delay as needed)
                setTimeout(checkInputs, 1000);
            }
        }
    </script>
@endpush
