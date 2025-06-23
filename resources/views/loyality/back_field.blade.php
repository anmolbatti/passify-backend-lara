<div class="offcanvas offcanvas-end" tabindex="-1" id="backfield_offcanvas" aria-labelledby="theme_offcanvasLabel"
    style="z-index: 9999 !important">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="backfield_offcanvas"> <i class="bx bxs-wrench me-1"></i>Back Fields</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="custom_hr">
    <div class="offcanvas-body">
        <div class="container mb-3">
            <div class="form-grup mt-5 backfield_div">
                <label for="Header">Label Header</label>
                <input type="text" id="header_name" class="form-control change_input"
                    placeholder="Terms and Conditions">
                <div class="mt-3">

                    <label for="First_Label">Value</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your content here..."></textarea>
                </div>

                <div class="d-flex justify-content-end mt-3 gap-3">
                    <div class="one">
                        <button type="button" class="btn btn--theme" onclick="addBackField()">
                            <i class='bx bx-plus'></i>
                        </button>
                    </div>
                    <div class="two">
                        <button type="button" class="btn bg-danger text-white" onclick="removeBackField(this)">
                            <i class='bx bx-trash'></i>
                        </button>
                    </div>
                </div>



            </div>














        </div>
    </div>
</div>
