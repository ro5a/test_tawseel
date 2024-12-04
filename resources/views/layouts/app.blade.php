<!DOCTYPE html>

<html lang="ar" class="light-style  layout-menu-fixed   " dir="rtl" data-theme="theme-default"
    data-framework="laravel" data-template="vertical-menu-theme-default-light">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name', 'Laravel') }}</title>
    @csrf
    <!-- Favicon -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" href="" type="image/png" media="(prefers-color-scheme: light)">
    <link rel="icon" href="" type="image/png"
        media="(prefers-color-scheme: dark)">
    <!-- Include Styles -->
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-chat.css') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/noto.css') }}" type="text/css" media="all" />


    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />

    <!-- Vendor Styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />


    <!-- Page Styles -->

    <!-- laravel style -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>

    <script src="{{ asset('assets/js/config.js') }}"></script>
    @stack('head')

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">



            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme"
               >
                <div class="app-brand demo ">
                    <a href="{{ route('dashboard') }}"
                        class="app-brand-link d-flex text-center justify-content-center align-items-center">
                        <span class=" text-center  fs-3" style='margin: 0 15px;'> {{ env('APP_NAME') }}
                        </span>
                    </a>
                    <a href="" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>



                <ul class="menu-inner py-1 pt-3">
                    <!-- Forms & Tables -->
                    {{-- dashboard --}}
                    <li class="menu-item  {{ url()->current() == route('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="menu-link ">
                            <i class='menu-icon tf-icons bx bxs-home-heart'></i>
                            <div>لوحة التحكم </div>
                        </a>
                    </li>


                    {{-- users --}}
                    <li class="menu-item {{ url()->current() == route('users') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle ">
                            <i class='menu-icon tf-icons bx bx-group'></i>
                            <div>المستخدمين </div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ url()->current() == route('users') ? 'active' : '' }}">
                                <a href="{{ route('users') }}" class="menu-link ">
                                    <div> العملاء</div>
                                </a>
                            </li>


                        </ul>
                    </li>





                    {{-- categories --}}
                    <li class="menu-item  {{ url()->current() == route('categories') ? 'active' : '' }}">
                        <a href="{{ route('categories') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-category"></i>
                            <div>الاقسام</div>
                        </a>
                    </li>


                    {{-- products --}}
                    <li class="menu-item  {{ url()->current() == route('products') ? 'active' : '' }}">
                        <a href="{{ route('products',) }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-box'></i>
                            <div> المنتجات</div>
                        </a>
                    </li>


                    <li class="menu-item  {{ url()->current() == route('orders') ? 'active' : '' }}">
                        <a href="{{ route('orders') }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-cart'></i>
                            <div> الطلبات</div>
                        </a>
                    </li>


                </ul>



            </aside>
            <!-- / Menu -->



            <!-- Layout container -->
            <div class="layout-page">

                @include('layouts.navigation')

                {{ $slot }}

                <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
                <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
                <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
                <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
                <!-- END: Page Vendor JS-->
                <script src="{{ asset('assets/js/main.js') }}"></script>

                <script src="{{ asset('js/functions.js') }}"></script>
                <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
                @stack('scripts')

                <!-- END: Page JS-->

</body>



</html>
