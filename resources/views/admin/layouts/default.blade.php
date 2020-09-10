<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.includes.head')
        
    </head>
    <body class="sb-nav-fixed">
        {{-- Header --}}
        @include('admin.includes.header')

        <div id="layoutSidenav">
            {{-- sidebar --}}
            @include('admin.includes.sidebar')
            <div id="layoutSidenav_content">
                @yield('content')
                {{-- footer --}}
                @include('admin.includes.footer')
            </div>
        </div>
        {{-- scripts --}}
        @include('admin.includes.scripts')
    </body>
</html>
