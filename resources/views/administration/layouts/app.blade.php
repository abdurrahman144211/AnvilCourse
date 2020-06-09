<!doctype html>
<html lang="en">
    @include('administration.layouts.partials._head')
    <body class="antialiased">
        @include('administration.layouts.partials._sidebar')
        <div class="page">
            @include('administration.layouts.partials._topnav')
            <div class="content">
                @yield('content')
                @include('administration.layouts.partials._footer')
            </div>
        </div>
    </body>
</html>
