<div class="p-[10px]">
    {{-- <div class="flex gap-[5px]">
        <i class='bx bxl-vimeo text-[20px]'></i>
        <a href="#" class="text-[#23527c]">{{ __('Watch video tutorial') }} : {{ __('Adding Details')}}</a>
    </div> --}}

    <div class="py-2">
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('Header Label') }}  </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input id="header_label" value="{{isset($pass->header_fields) ? json_decode($pass->header_fields)[0]->label ?? '':'STAMPS' }}" name="header_fields[0][label]" oninput="getValueFromInputIdToInnerHTML('header_label','header_label')" name="header_fields[0][label]"  class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="e.g. {{ __('POINTS') }}">
            {{-- <input value="{{isset($pass->header_fields) ? json_decode($pass->header_fields)[0]->label ?? '':'STAMPS' }}" name="header_fields[0][label]" type="hidden"> --}}
        </div>
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('STAMPS') }} </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input id="header_value" value="{{isset($pass->header_fields) ? json_decode($pass->header_fields)[0]->value ?? '':'1/10' }}" oninput="getValueFromInputIdToInnerHTML('header_value','header_value')" name="header_fields[0][value]" class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="e.g. 2345" disabled>
            <input value="{{isset($pass->header_fields) ? json_decode($pass->header_fields)[0]->value ?? '':'1/10' }}" name="header_fields[0][value]" type="hidden">
        </div>
    </div>

    <hr class="text-[#f74780] my-3" />

    <div class="py-2">
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('Secondary Label') }}  </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input id="secondary_label_1" value="{{isset($pass->secondary_fields) ? json_decode($pass->secondary_fields)[0]->label ?? '':'STAMPS REQUIRED UNTIL NEXT REWARD' }}" name="secondary_fields[0][label]" oninput="getValueFromInputIdToInnerHTML('secondary_label_1','secondary_label_1')" name="secondary_fields[0][label]"  class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="e.g. {{ __('POINTS') }}">
            {{-- <input value="{{isset($pass->secondary_fields) ? json_decode($pass->secondary_fields)[0]->label ?? '':'STAMPS REQUIRED UNTIL NEXT REWARD' }}" name="secondary_fields[0][label]"  type="hidden"> --}}
        </div>
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('Secondary Label Value') }}  </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input id="secondary_value_1" value="{{isset($pass->secondary_fields) ? json_decode($pass->secondary_fields)[0]->value ?? '':'10' }}" oninput="getValueFromInputIdToInnerHTML('secondary_value_1','secondary_value_1')" name="secondary_fields[0][value]" class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="e.g. 2345" disabled>
            <input value="{{isset($pass->secondary_fields) ? json_decode($pass->secondary_fields)[0]->value ?? '':'10' }}" name="secondary_fields[0][value]" type="hidden">
        </div>
    </div>

    <hr class="text-[#f74780] my-3" />


    <div class="py-2">
        <div class="form-group py-3">
            <div class="flex">
                {{-- <label class="form-label text-[.9em] font-[500]">{{ __('Secondary Label 2') }}</label> --}}
                {{-- <i class='bx bxs-info-circle text-[18px]'></i> --}}
            </div>
            {{-- <input id="secondary_label_2" value="{{isset($pass->secondary_fields) ? json_decode($pass->secondary_fields)[1]->label ?? '':' ' }}" oninput="getValueFromInputIdToInnerHTML('secondary_label_2','secondary_label_2')" name="secondary_fields[1][label]"  class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="e.g. {{ __('POINTS') }}" disabled> --}}
            <input value="{{isset($pass->secondary_fields) ? json_decode($pass->secondary_fields)[1]->label ?? '':' ' }}" name="secondary_fields[1][label]" type="hidden">
        </div>
        <div class="form-group py-3">
            <div class="flex">
                {{-- <label class="form-label text-[.9em] font-[500]">{{ __('Secondary Label Value') }}  </label> --}}
                {{-- <i class='bx bxs-info-circle text-[18px]'></i> --}}
            </div>
            {{-- <input id="secondary_value_2" value="{{isset($pass->secondary_fields) ? json_decode($pass->secondary_fields)[1]->value ?? '':' ' }}" oninput="getValueFromInputIdToInnerHTML('secondary_value_2','secondary_value_2')" name="secondary_fields[1][value]" class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="e.g. 2345" disabled> --}}
            <input value="{{isset($pass->secondary_fields) ? json_decode($pass->secondary_fields)[1]->value ?? '':' ' }}" name="secondary_fields[1][value]" type="hidden">
        </div>
    </div>



</div>
