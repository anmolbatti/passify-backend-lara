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
    <i class="bi bi-card-list header-icon"></i>
        <a
          href="#tab-2"
          class="flex gap-[5px] items-center cursor-pointer p-2 focus-within:bg-[#e7e7e7] font-[300] text-base nav hover:text-[#212529]">
           {{ __('Details') }}
        </a>
    </div>
    <div class="flex items-center justify-center focus-within:bg-[#e7e7e7]">
      <i class="bx bx-file header-icon"></i>
        <a
          href="#tab-3"
          class="flex gap-[5px] items-center cursor-pointer p-2 focus-within:bg-[#e7e7e7] font-[300] text-base nav hover:text-[#212529]">
          {{ __('Fields') }}
        </a>
    </div>
    {{-- <div class="flex items-center justify-center focus-within:bg-[#e7e7e7]">
    <i class="bi bi-geo-alt header-icon"></i>
        <a
          href="#tab-4"
          class="flex gap-[5px] items-center cursor-pointer p-2 focus-within:bg-[#e7e7e7] font-[300] text-base nav hover:text-[#212529]">
          {{ __('Locations') }}
        </a>
    </div> --}}
    </div>



    <div class="flex gap-[5px] items-center cursor-pointer p-2 focus-within:bg-[#e7e7e7] text-base nav hover:text-[#212529]">
      <i class="bx bxs-save header-icon"></i>
      <button type="submit" form="pass_form" class="me-3 cursor-pointer">
        {{ __('Save') }}
      </button>
    </div>
  </div>
</div>




