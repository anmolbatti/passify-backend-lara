<div class="offcanvas offcanvas-end" tabindex="-1" id="settings_offcanvas" aria-labelledby="theme_offcanvasLabel"
    style="z-index: 9999 !important">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="settings_offcanvas"> <i class="bx bxs-wrench me-1"></i>Settings</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="custom_hr">
    <div class="offcanvas-body">
        <div class="container mb-3">
            <div class="form-grup mt-5">
                <label for="header_field">Header Field</label>
                <input type="text" value="{{ $pass->header_field ?? '' }}" id="header_field" class="form-control change_input"
                    placeholder="Points" value="Points" data-input="header_value">
                <div class="mt-3">

                    <label for="dislay_value">Display Value</label>
                    <select value="{{ $pass->dislay_value ?? '' }}" id="dislay_value" class="form-control-select w-100 mt-2">
                        <option value="0">Number</option>
                        <option value="C">Char</option>
                    </select>
                </div>

            </div>

            <div class="border_bottom_card">
            </div>

            <div class="form-grop mt-5">
                <label for="first_label">First Label</label>
                <input type="text" value="{{ $pass->first_label ?? '' }}" id="first_label" class="form-control change_input"
                    placeholder="My Program .." value="Name" data-input="first_label_value">
                <div class="mt-3">

                    <label for="first_label_value">Display Value</label>
                    <select id="first_label_value" class="form-control-select w-100 mt-2">
                        <option value="name" {{ $pass->first_label_value == 'name' ? 'selected':'' }} >User Name</option>
                    </select>
                </div>
            </div>
            <div class="border_bottom_card">
            </div>

            <div class="form-grop mt-5">
                <label for="second_label">Second Label</label>
                <input type="text" value="{{ $pass->second_label ?? '' }}" id="second_label" class="form-control change_input"
                    placeholder="My Program .." value="Tier" data-input="second_label_value">
                <div class="mt-3">

                    <label for="second_label_value">Display Value</label>
                    <select id="second_label_value" class="form-control-select w-100 mt-2">
                        <option value="name" {{ $pass->second_label_value == 'name' ? 'selected':'' }} >Text (user will given)</option>
                    </select>
                </div>
            </div>
            <div class="border_bottom_card">
            </div>


            <div class="form-grop mt-5">
                <label for="organization_name">Organization Name</label>
                <input type="text" id="organization_name" class="form-control" placeholder="Passify.."
                    value="{{ $pass->organization_name ?? auth()->user()->organization_name }}">
            </div>
            <div class="border_bottom_card">
            </div>

            <div class="form-group mt-5">
                <label for="Additional">Additional Fields</label>

                <div class="flex">
                    <div class="flex items-center h-5">
                        <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox"
                            value="expiry_date"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            onclick="showExpiryDate(this)"
                            {{ $pass->is_expiry_date == '1' ? "checked":'' }}
                        >
                    </div>
                    <div class="ms-2 text-sm">
                        <label for="helper-checkbox" class="font-medium text-gray-900 dark:text-gray-300">Expiry
                            Date</label>
                        <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">
                            Add an Expiry Date for Your Program
                        </p>
                    </div>
                </div>

            </div>


            <div class="form-grop mt-5 expiry_date_div {{ $pass->is_expiry_date ?? 'd-none' }}">
                <label for="expiry_date">Expiry Date</label>
                <input type="date" value="{{ $pass->expiry_date ?? '' }}" id="expiry_date" class="form-control form-control-date">
            </div>
            <div class="border_bottom_card">
            </div>



        </div>
    </div>
</div>
