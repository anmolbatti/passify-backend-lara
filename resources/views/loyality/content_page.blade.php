<div class="row">

    <div class="col-8 col-lg-8 h-[100vh] w-[100%] overflow-x-auto scrollbar-hidden">
        @if ($errors->any())
            <div class="text-red-600">{{ __('Please fill the required fields') }}</div>
            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        @endif

        <form id="pass_form" action="{{ route('pass.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active">
                    @include('loyality.theme')
                </div>
                <div id="tab-2" class="tab-pane">
                    @include('design_containers.details')
                </div>
                <div id="tab-3" class="tab-pane">
                    @include('design_containers.fields')

                </div>
                {{-- <div id="tab-4" class="tab-pane">
                    @include('design_containers.locations')

                </div> --}}
            </div>
            @include('loyality.settings')
            @include('loyality.back_field')
        </form>
    </div>

    <div class="col-4">
        @include('loyality.phone_layout')

    </div>
</div>
