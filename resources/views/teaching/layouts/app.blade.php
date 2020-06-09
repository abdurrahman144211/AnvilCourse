<!doctype html>
<html lang="en">
    @include('teaching.layouts.partials._head')
    <body class="antialiased">
        @include('teaching.layouts.partials._sidebar')
        <div class="page">
            @include('teaching.layouts.partials._topnav')
            <div class="content">
                @yield('content')
                @include('teaching.layouts.partials._footer')
            </div>
        </div>
    </body>
</html>
