@include('endUser.layouts.head')

<body>

    <!-- preloader-start -->
    <div id="preloader">
        <div class="rasalina-spin-box"></div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    @include('endUser.layouts.header')
    <!-- header-area-end -->

    <!-- main-area -->


        @yield('content')

        <!-- contact-area -->
        @include('endUser.layouts.homeContact')
        <!-- contact-area-end -->

    <!-- main-area-end -->



    <!-- Footer-area -->
    @include('endUser.layouts.footer')
    <!-- Footer-area-end -->




    <!-- JS here -->
    @include('endUser.layouts.scripts')
