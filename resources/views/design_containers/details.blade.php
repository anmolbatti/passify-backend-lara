<div class="p-[10px]">

    <div class="py-2">
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('Card description') }}  </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input name="card_description" id="cardDescription" onclick="navigateToSection('cardDescriptionId')" oninput="getValueFromInputIdToInnerHTML('cardDescription','cardDescription')" value="{{ $pass->card_description ?? '' }}" class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="{{ __('Collect stamps for cool rewards!') }}">
        </div>
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('How your customers earn 1 stamp') }}  </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <textarea rows="5" name="how_can_earn" id="customersEarn" onclick="navigateToSection('customersEarnId')" oninput="getValueFromInputIdToInnerHTML('customersEarn','customersEarn')" class="form-control text-[#555555] font-[100] text-[15px]" placeholder="{{__('Spend $5 to get 1 stamp.')}}">{{ $pass->how_can_earn ?? '' }}</textarea>
        </div>

        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('Business Name') }}  </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input name="business_name" id="businessName" onclick="navigateToSection('businessNameId')" oninput="getValueFromInputIdToInnerHTML('businessName','businessName')" value="{{ $pass->business_name ?? '' }}" class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="{{__('abc')}}">
        </div>
    </div>

    <hr class="text-[#f74780] my-3" />

    <div class="py-2">
        <h1 class="text-[1.1rem] font-[500]">{{ __('Reward Details') }}</h1>
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('Reward Name') }}  </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input name="reward_name" id="rewardName" onclick="navigateToSection('rewardNameId')" oninput="getValueFromInputIdToInnerHTML('rewardName','rewardName')" value="{{ $pass->reward_name ?? '' }}" class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="{{ __('Free coffee') }}">
        </div>
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('Description') }}  </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <textarea name="reward_description" onclick="navigateToSection('descriptionId')" id="description" oninput="getValueFromInputIdToInnerHTML('description','description')" rows="5" class="form-control text-[#555555] font-[100] text-[15px]" placeholder="{{__('You will get a free coffee after collecting 8 stamps.')}}">{{ $pass->reward_description ?? '' }}</textarea>
        </div>
    </div>

    <hr class="text-[#f74780] my-3" />


    <div class="py-2">
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('Stamp success message') }} </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input name="stamp_success_message" onclick="navigateToSection('stampSuccessId')" id="stampSuccess" oninput="getValueFromInputIdToInnerHTML('stampSuccess','stampSuccess')" value="{{ $pass->stamp_success_message ?? '' }}" class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="{{ __('Only {#} more stamps until your reward!') }}">
            <p class="text-[10px] font-[300]">{{ __("You must include {#} in your stamp success message. '{#}' is a placeholder for the number of stamps.") }}</p>
        </div>
        <div class="form-group py-3">
            <div class="flex">
                <label class="form-label text-[.9em] font-[500]">{{ __('Reward success message') }} </label>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>
            <input name="reward_success_message" onclick="navigateToSection('rewardSuccessId')" id="rewardSuccess" oninput="getValueFromInputIdToInnerHTML('rewardSuccess','rewardSuccess')" value="{{ $pass->reward_success_message ?? '' }}" class="form-control text-[#555555] font-[100] text-[15px] py-2" placeholder="{{ __('Come and get your free coffee today!') }}">
        </div>

        <div class="form-group py-3">
            <div class="flex items-center gap-2">
                <h2 class="font-bold text-[22px]">{{__("Expiry")}}</h2>
                <i class='bx bxs-info-circle text-[18px]'></i>
            </div>

            <div>
                <input type="radio" id="none" name="expiry_type" value="none" onclick="resetExpiryDate(); navigateToSection('expiryDateId')">
                <label for="none">{{__("None")}}</label>
            </div>


            <div class="flex">
    <div>
        <input type="radio" id="FixedDate" name="expiry_type" value="fixed_date" onclick="toggleExpiryInput(); navigateToSection('expiryDateId')">
        <label class="form-label text-[.9em] font-[500]" for="FixedDate">{{ __('Fixed Date') }} </label>
    </div>
</div>

<input type="date" id="expiryDate" onclick="navigateToSection('expiryDateId')" oninput="getValueFromInputIdToInnerHTML('expiryDate','expiryDate');" value="{{ $pass->expiry_date ?? '' }}" name="expiry_date" class="block w-full px-3 py-2 text-base font-normal leading-1.5 text-body-color bg-body-bg bg-clip-padding-box border border-border-width border-border-color rounded-[0.375rem] transition duration-150 ease-in-out" placeholder="{{ __('Come and get your free coffee today!') }}" style="display: none;">

<div class="row">
    <div>
        <input type="radio" id="FixedPeriodAfterSignup" name="expiry_type" value="fixed_period" onclick="toggleFixedPeriodInputs(); navigateToSection('expiryDateId')">
        <label class="form-label text-[.9em] font-[500]" for="FixedPeriodAfterSignup">{{__("Fixed period after signup")}}</label>
    </div>
    <div class="col-md-4" id="expiryNumberContainer" style="display: none;">
        <input type="number" id="expiryNumber" name="expiryNumber" oninput="updateExpiryDate()" class="block px-3 py-2 text-base font-normal leading-1.5 text-body-color bg-body-bg bg-clip-padding-box border border-border-width border-border-color rounded-[0.375rem] transition duration-150 ease-in-out" placeholder="{{ __('Enter a number') }}">
    </div>
    <div class="col-md-4" id="unitSelectorContainer" style="display: none;">
        <select id="unitSelector" name="expiry_period_type" class="form-control px-3 py-2" onchange="updateExpiryDate()">
            <option value="year">{{__("Year")}}</option>
            <option value="month">{{__("Month")}}</option>
            <option value="day">{{__("Day")}}</option>
        </select>
    </div>
</div>

 </div>

    </div>


     <!-- table  -->

<table class="table table-striped" id="example">
  <thead class="table-active">
         <tr>
            <th scope="col">
                <div class="flex">
                <label class="form-label text-[15px] font-[500]">{{ __('Text') }}</label>
                <i class='bx bxs-info-circle text-[18px]'></i>

                </div>
            </th>
            <th scope="col">
                <div class="flex">
                <label class="form-label text-[15px] font-[500]">{{ __('Link') }}</label>
                <i class='bx bxs-info-circle text-[18px]'></i>
                </div>
            </th>
            <th scope="col">
                <div class="flex">
                <label class="form-label text-[15px] font-[500]">{{ __('Type') }}</label>
                <i class='bx bxs-info-circle text-[18px]'></i>
                </div>
            </th>
            <th>

            </th>
          </tr>
  </thead>

  <tbody id="tbody">

  </tbody>
   <tfoot>
        <tr>
            <td colspan="4">
                <button class="btn btn-outline-danger float-end cursor-pointer border flex items-center justify-center" id="add_row_btn">
                    <i class='bx bx-plus text-[18px]'></i>
                </button>
                {{-- <button class="btn btn-primary float-end cursor-pointer border flex items-center justify-center" id="save_btn">
                    Save
                </button> --}}
            </td>
        </tr>
   </tfoot>
</table>

</div>



@push('script')
    <script>
        let rowCount = 0;  // Initialize a counter for unique IDs

        const addrow = () => {
            rowCount++;  // Increment the counter for each new row

            // Generate unique IDs for elements in the row
            const uniqueTextDescriptionId = `textDescription${rowCount}`;

            // Update the tablerow HTML with the unique ID
            var tablerow = `<tr>
                <td>
                    <div class="form-group">
                        <input id="${uniqueTextDescriptionId}" name="link_text[]" onclick="navigateToSection('textDescriptionId')" oninput="getValueFromInputIdToInnerHTML('${uniqueTextDescriptionId}','${uniqueTextDescriptionId}')" value="{{ $pass->link_text ?? '' }}" class="form-control text-[#555555] font-[100] text-[15px]" name="linkDescription${rowCount}" placeholder="{{ __('Visit us online') }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input name="link_href[]" value="{{ $pass->link_href ?? '' }}" class="form-control text-[#555555] font-[100] text-[15px]" name="linkHref${rowCount}" placeholder="http://passkit.com">
                    </div>
                </td>
                <td>
                    <div class="form-group form-inline">
                        <select name="link_type[]" class="form-control cursor-pointer text-[#555555] font-[100] text-[15px]">
                            <option label="Url" value="url" {{ isset($pass->link_type) ? $pass->link_type == 'url' ? 'selected':'':'' }}>{{ __('Url') }}</option>
                            <option label="Phone" value="phone" {{ isset($pass->link_type) ? $pass->link_type == 'phone' ? 'selected':'':'' }}>{{ __('Phone') }}</option>
                            <option label="Email" value="email" {{ isset($pass->link_type) ? $pass->link_type == 'email' ? 'selected':'':'' }}>{{ __('Email') }}</option>
                            <option label="Address" value="address" {{ isset($pass->link_type) ? $pass->link_type == 'address' ? 'selected':'':'' }}>{{ __('Address') }}</option>
                        </select>
                    </div>
                </td>
                <td>
                    <button class="btn delete-btn"><i class="bi bi-trash3"></i></button>
                </td>
            </tr>`;

            // Append the row to the tbody
            $("#example #tbody").append(tablerow);
            $("#textDescriptionId").append(`<p class="text-[11px] text-[#7f7f7f] ${uniqueTextDescriptionId}"> </p>`);
        }
        setTimeout(addrow, 2000);

        $("#add_row_btn").on("click", function(e) {
            e.preventDefault();
            addrow();
        });

        $("#example").on("click", ".delete-btn", function () {
            $(this).closest("tr").remove();
        });



        function resetExpiryDate() {
        document.getElementById('expiryDate').value = '';
    }

        function toggleExpiryInput() {
        const expiryInput = document.getElementById("expiryDate");
        const expiryNumberContainer = document.getElementById("expiryNumberContainer");
        const unitSelectorContainer = document.getElementById("unitSelectorContainer");



        if (document.getElementById("FixedDate").checked) {
            expiryInput.style.display = "block";
            expiryNumberContainer.style.display = "none";
            unitSelectorContainer.style.display = "none";


        } else {
            expiryInput.style.display = "none";
        }
    }


    function toggleFixedPeriodInputs() {
        const expiryInput = document.getElementById("expiryDate");

        const expiryNumberContainer = document.getElementById("expiryNumberContainer");
        const unitSelectorContainer = document.getElementById("unitSelectorContainer");

        if (document.getElementById("FixedPeriodAfterSignup").checked) {
            expiryNumberContainer.style.display = "block";
            unitSelectorContainer.style.display = "block";
            expiryInput.style.display = "none";

        } else {
            expiryNumberContainer.style.display = "none";
            unitSelectorContainer.style.display = "none";
        }
    }

    </script>


@endpush
