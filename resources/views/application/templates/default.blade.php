<!DOCTYPE html>
<html lang="en">

    @include('application.templates.partials._head')

    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    @include('application.templates.partials._header')


        <div class="wrapper">
            <div class="container-fluid">

                @yield('content')

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        @include('application.templates.partials._footer')


        @include('application.templates.partials._scripts')


    </body>
</html>