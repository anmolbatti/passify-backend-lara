<div class="col-md-4 pl-[2rem]  right-0 h-[100%] hidden lg:block border-l-2 scale-[0.8] mobileBorder">
    <div class="flex gap-2 items-start">
        <div class="flex flex-col items-center">
        <h5 class="text-[12px] py-[5px] font-[600]">Your Customers' View</h5>
        <div class="relative border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[600px] w-[300px] shadow-xl">
            <div
                class="w-[148px] h-[18px] bg-gray-800 top-0 rounded-b-[1rem] left-1/2 -translate-x-1/2 absolute">
            </div>
            <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[124px] rounded-s-lg"></div>
            <div class="h-[46px] w-[3px] bg-gray-800 absolute -start-[17px] top-[178px] rounded-s-lg"></div>
            <div class="h-[64px] w-[3px] bg-gray-800 absolute -end-[17px] top-[142px] rounded-e-lg"></div>
            <div class="rounded-[2rem] overflow-hidden w-[272px] h-[572px] bg-white dark:bg-gray-800">
                    <div id="detail_page" style="display:none">
                    @include('design_containers.detail_Card');
                    </div>
                    <div id="cofee_temp">
                         @include('design_containers.cofee_dashboard');
                    </div>

                    <div id="lock_screen" style="display:none">
                        @include('design_containers.lockScreen');
                    </div>
                    <div id="android_screen" style="display:none">
                        @include('design_containers.androidView');
                    </div>

            </div>


        </div>
</div>

<!-- icons  -->
<div class="flex flex-col gap-2 mt-5">
    <button
        onclick="appleView()"
        data-tooltip-target="appleView" data-tooltip-placement="left"
        class="w-[30px] h-[30px] rounded-lg border-[1px] border-solid border-[#f74780]">
        <i class="bi bi-apple"></i>
    </button>

    <div id="appleView" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Apple wallet preview
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <button
        onclick="androidView()"
        data-tooltip-target="androidView" data-tooltip-placement="left"
        class="w-[30px] h-[30px] rounded-lg border-[1px] border-solid border-[#f74780]">
        <i class="bi bi-android2"></i>
    </button>

    <div id="androidView" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Android Preview
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

    <button
        onclick="notificationView()"
        data-tooltip-target="lockScreenView" data-tooltip-placement="left"
        class="w-[30px] h-[30px] rounded-lg border-[1px] border-solid border-[#f74780]">
        <i class="bi bi-chat-fill"></i>
    </button>

    <div id="lockScreenView" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Lock Screen Preview
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>







@push('script')
<script>
    const notificationView = () => {
        let detail_page = document.getElementById("detail_page");
        let cofee_temp = document.getElementById("cofee_temp");
        let lock_screen = document.getElementById("lock_screen");
        lock_screen.style.display = "block";
        detail_page.style.display = "none";
        cofee_temp.style.display = "none";
    }


    const appleView = ()=>{
        let detail_page = document.getElementById("detail_page");
        let cofee_temp = document.getElementById("cofee_temp");
        let lock_screen = document.getElementById("lock_screen");
        lock_screen.style.display = "none";
        detail_page.style.display = "none";
        cofee_temp.style.display = "block";
    }

    const androidView = ()=>{
        let detail_page = document.getElementById("detail_page");
        let cofee_temp = document.getElementById("cofee_temp");
        let lock_screen = document.getElementById("lock_screen");
        let android_screen = document.getElementById("android_screen");
        lock_screen.style.display = "none";
        detail_page.style.display = "none";
        cofee_temp.style.display = "none";
        android_screen.style.display = "block";
    }


</script>
@endpush

