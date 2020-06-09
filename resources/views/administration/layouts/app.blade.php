<!doctype html>
<html lang="en" dir="ltr">
    @include('administration.layouts.partials._head')
    <body class="">
        <div class="page">
            <div class="flex-fill">
                @include('administration.layouts.partials._topnav')
                <div class="my-3 my-md-5">
                    @yield('content')
                </div>
            </div>
            @include('administration.layouts.partials._footer')
        </div>
    </body>
</html>
