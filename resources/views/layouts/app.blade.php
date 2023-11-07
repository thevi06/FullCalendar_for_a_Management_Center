@include('layouts.top')

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('partials.header')

    @include('partials.menu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('breadcrumb')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @yield('content')

            </div>
        </section>
    </div>

    @include('partials.footer')

</div>

@include('layouts.bottom')

@yield('datatable_script')

@yield('scripts')

@include('layouts.notification_alerts')
</body>
</html>
