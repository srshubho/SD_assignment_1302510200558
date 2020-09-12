<!DOCTYPE html>
<html lang="en">
    <head>
        @include('website.includes.head')
        
    </head>
    <body >
        {{-- Header --}}
        @include('website.includes.header')

        <div class="container">
                @yield('content')
                {{-- footer --}}
                @include('website.includes.footer')
            
        </div>
        {{-- scripts --}}
        @include('website.includes.scripts')
    </body>
</html>
