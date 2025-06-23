@extends('layouts.play-ground')
@section('content')
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            <div class="container arabic-container">
                <div class="flex gap-2 flex-wrap items-start arabic-wrapper" id="apple_div">
                    @foreach ($passes as $pass)
                    <div class="flex flex-col items-center">
                        <div class="relative border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-xl scale-[0.8]">
                            <div
                                class="w-[148px] h-[18px] bg-gray-800 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute">
                            </div>
                            <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg"></div>
                            <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg"></div>
                            <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg"></div>
                            <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">

                                <a href="{{ route('loyality.start_design', $pass->pass_name) }}">
                                @include('design_containers.cofee_dashboard');
                                </a>

                            </div>
                        </div>
                        <div class="flex items-center gap-[8px]">
                            <button class="d-flex justify-content-center"
                            style="margin-top:-36px;"
                            >
                                {{-- <a href="{{ route('manage.image', $pass->id) }}" class="btn btn-sm btn-success">{{ __('Images') }}</a> --}}
                            </button>
                            <button class="d-flex justify-content-center"
                            style="margin-top:-36px;"
                            >
                                <a href="{{ route('manage.program', $pass->id) }}" class="btn btn-sm btn-success">{{ __('Manage') }}</a>
                            </button>
                            <button onclick="deleteThis('delete_form_'+{{$pass->id}})"  class="btn btn-sm btn-danger" style="margin-top:-36px;" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ __('Delete') }}!</button>
                        </div>
                        <form class="d-none" id={{"delete_form_".$pass->id}} method="post" action="{{route('delete.program',['id' => $pass->id])}}">
                            @csrf
                        </form>
                    </div>
                    @endforeach
                        <div>
                            <div class="relative border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-xl
                             scale-[0.8]">
                                <div
                                    class="w-[148px] h-[18px] bg-gray-800 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute">
                                </div>
                                <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg"></div>
                                <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg"></div>
                                <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg"></div>
                                <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">
                                <a href="{{ route('loyality.start_design', 'coffee') }}">

                                    @include('design_containers.newCard');
                                </a>

                                </div>
                            </div>
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
@endpush
