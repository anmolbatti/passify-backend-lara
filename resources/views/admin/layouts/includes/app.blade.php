<?php
	$themeClass = '';
	if (!empty($_COOKIE['theme'])) {
		if ($_COOKIE['theme'] == 'dark') {
			$themeClass = 'dark-theme';
		} else if ($_COOKIE['theme'] == 'light') {
			$themeClass = 'light-theme';
		}  
	}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- METADATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="" name="description">
    <meta content="" name="author">
    <meta name="keywords" content="" />

    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- TITLE -->
    <title>@yield('title')-{{ config('app.name') }}</title>
    @include('admin.layouts.header')
    <link rel="stylesheet" href="{{asset('admin/icofont/icofont.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin//css/custom.css')}}">

    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <script src="{{asset('admin//plugins/jquery/jquery.min.js')}}"></script>


    {{-- <link rel="stylesheet" href="{{asset('admin/assets1/vendor/bootstrap/css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('admin/assets1/vendor/fonts/circular-std/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets1/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets1/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets1/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets1/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets1/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets1/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets1/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    
    {{-- Map Links --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <style>
    /* Style for theme change start */
    .side-menu {
        background-color: #01112b;
    }

    .app-sidebar .side-item.side-item-category {
        color: #fff;
    }

    .app-sidebar {
        background-color: #01112b!important;
    }

    .side-menu__item.active .side-menu__icon {
        color: #01112b;
    }

    .side-menu__item.active .side-menu__label {
        color: #01112b;
    }
    .side-menu__item .side-menu__icon{
        color: #fff;
    }

    .side-menu__item .side-menu__label{
        color: #fff;
    }
    .side-menu__label {
        color: #01112b;
    }
    .side-menu__item:hover .side-menu__label,
    .side-menu__item:hover .side-menu__icon {
        color: #01112b;
        font-weight: bold;
    }

    /* Style for theme change end */

    .nav-item .active{
        background-color: #4656e9;
        color: white;
    }
    #map {
      width: 100%;
      height: 500px;
    }

    .btn {
        border-radius: 4px !important;
    }

    .card-header>.card-tools {
        float: right !important;
        margin-right: -0.625rem;
    }

    .card-header>.card-title {
        margin-top: 1%;
    }

    .card-title {
        float: left;
        font-size: 1.1rem;
        font-weight: 400;
        margin: 0;
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .card-header {
        background-color: #fff;
    }

    .edit-action-button {
        cursor: pointer !important
    }

    table.dataTable.dtr-inline.collapsed.compact>tbody>tr>td:first-child:before,
    table.dataTable.dtr-inline.collapsed.compact>tbody>tr>th:first-child:before {
        top: 12px !important;
    }

    .text-primary {
        color: #11075c !important;
    }

    .font-weight-bold {
        font-weight: 700 !important;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6 {
        margin-bottom: .5rem;
        font-weight: 500;
        line-height: 1.2
    }

    h1,
    .h1 {
        font-size: 2.5rem
    }

    h2,
    .h2 {
        font-size: 2rem
    }

    h3,
    .h3 {
        font-size: 1.75rem
    }

    h4,
    .h4 {
        font-size: 1.5rem
    }

    h5,
    .h5 {
        font-size: 1.25rem
    }

    h6,
    .h6 {
        font-size: 1rem
    }
    </style>
    <script src="/admin/selectize/ajax_jquery.min.js"></script>
    <link rel="stylesheet" href="/admin/selectize/css_selectize.default.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/admin/selectize/selectize.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>

<body class="app sidebar-mini <?php echo $themeClass; ?>">

    <!-- LOADER -->
    {{-- <div id="preloader" >
			<img src="{{URL::asset('img/svgs/preloader.gif')}}" alt="loader">
    </div> --}}
    <!-- END LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            @include('admin.layouts.nav-aside')

            <!-- APP CONTENT -->
            <div class="app-content main-content">

                <div class="side-app">

                    @include('admin.layouts.nav-top')

                    {{-- @include('layouts.flash') --}}

                    @yield('page-header')

                    @yield('content')
                    <script>
                    $('.selectize').selectize();
                    </script>
                </div>
            </div>
            <!-- END APP CONTENT -->

            @include('admin.layouts.footer')

        </div>
    </div><!-- END PAGE -->
    <!-- Confirmation modal -->
    <div class="modal fade" id="modal-confirm">
        <div class="modal-dialog">
            <form id="modal-form">
                @csrf
                <div id="customInput"></div>
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h4 class="modal-title">{{trans('customer.confirmation')}}</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer p-2">
                        <button id="modal-confirm-btn" type="button" class="btn btn-primary btn-sm">{{trans('customer.confirm')}}</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">{{trans('customer.cancel')}}</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    @include('admin.layouts.footer-backend')

    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    {{-- <script src="{{asset('admin/assets1/vendor/jquery/jquery-3.3.1.min.js')}}"></script> --}}
    <script src="{{asset('admin/assets1/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('admin/assets1/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('admin/assets1/libs/js/main-js.js')}}"></script>
    {{-- <script src="{{asset('admin/assets1/vendor/charts/chartist-bundle/chartist.min.js')}}"></script> --}}
    <script src="{{asset('admin/assets1/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('admin/assets1/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{asset('admin/assets1/vendor/charts/morris-bundle/morris.js')}}"></script>
    <script src="{{asset('admin/assets1/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{asset('admin/assets1/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{asset('admin/assets1/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    {{-- <script src="{{asset('admin/assets1/libs/js/dashboard-ecommerce.js')}}"></script> --}}

    @yield('extra-scripts')
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <style>
    .select2-container .select2-selection--single {
        height: 37px !important;
    }

    .lang-colour i {
        color: black;
        font-size: 24px;
    }

    #tbody .selectize-control.single .selectize-input,
    .selectize-dropdown.single {
        border-color: #fff4f4;
    }

    .row .col-12 .row-card{
        height: 280px!important;
    }
    </style>
    <script>
    // jQuery('button[type="submit"]').on('click', function (e) {
    //     var form = $(this).parents('form:first');
    //     if (form.valid()) {
    //         $(this).attr('disabled', 'disabled').addClass('disabled')
    //         $(this).html(' <i class="fa fa-spinner fa-spin"></i> Loading');
    //         form.submit();
    //     }
    // });
    // jQuery('#modal-confirm-btn').on('click', function (e) {
    //     var form = $(this).parents('form:first');
    //     if (form.valid()) {
    //         $(this).attr('disabled', 'disabled').addClass('disabled')
    //         $(this).html(' <i class="fa fa-spinner fa-spin"></i> Loading');
    //         form.submit();
    //     }
    // });
    </script>
    <script>
    $(document).on('click', '.gateway-bb', function(e) {
        const type = $(this).attr('data-type');
        localStorage.setItem("gateway_type", type);
    });
    $(document).on('click', '.sending-setting', function(e) {
        const type = $(this).attr('data-type');
        localStorage.setItem("sending_setting", type);
    });
    </script>
    <script>
    if ('{{request()->segment(2)== '
        settings '}}') {
        const gateway = localStorage.getItem("gateway_type");
        const sending_setting_nav = localStorage.getItem("sending_setting");

        if (gateway) {
            $("#" + gateway).trigger('click');
            $('.gateway-bb').addClass('active');
        }
        if (sending_setting_nav) {
            $("#" + sending_setting_nav).trigger('click').addClass('active');
            $('.sending-setting').addClass('active');
        }
    } else {
        localStorage.clear();
    }
    </script>
    <script>
    $(document).ready(function() {
        $('.form-control-sm').attr('placeholder', 'Type here to search...');
    });
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

  
    </script>

    @if(session()->has('success') || session()->has('fail') || count($errors)>0)

    @endif
    
</body>

</html>