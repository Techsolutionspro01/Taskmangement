<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @include('layout.style')
    </head>

    <body>
        <!-- Begin page -->
        <div class="layout-wrapper">

            <!-- Left Sidebar -->
            @include('layout.sidebar')

            <!-- Start Page Content here -->
            <div class="page-content">

                <!-- Topbar -->
                @include('layout.navbar')

                <!-- Content Start -->
                <div class="px-3">

                    <!-- Container Start -->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="py-3 py-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="page-title mb-0">@yield('pageTitle')</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @yield('content')

                    </div><!-- Container End -->

                </div> <!-- Content End -->

                @include('layout.footer')
            </div> <!-- End Page Content -->

        </div>

        @include('layout.script')
        @yield('script')

    </body>

</html>
