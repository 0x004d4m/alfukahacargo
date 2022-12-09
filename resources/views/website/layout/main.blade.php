<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        @include('website.layout.head')
        @yield('styles')
    </head>
    <body>
        @include('website.layout.spinner')
        @include('website.layout.navbar')
        @yield('content')
        @include('website.layout.footer')
        @include('website.layout.scripts')
        @yield('scripts')
    </body>
</html>
