<!DOCTYPE html>
<html lang="en" dir="{{__('content.lang3')}}">
    <head>
        <title>@yield('title')</title>
        @include('website.layout.head')
        <style>
            .navimg{
                width: 30%;
                height: 20%;
            }
            @media only screen and (min-width: 992px) {
                .navimg{
                    width: 15%;
                    height: 10%;
                }
            }
        </style>
        @if (Session::get('locale')=='ar')
            <style>
                .header-carousel .owl-nav {
                    position: absolute;
                    top: 50%;
                    left: 8%;
                    transform: translateY(-50%);
                    display: flex;
                    flex-direction: column;
                }
            </style>
        @else
            <style>
                .header-carousel .owl-nav {
                    position: absolute;
                    top: 50%;
                    right: 8%;
                    transform: translateY(-50%);
                    display: flex;
                    flex-direction: column;
                }
            </style>
        @endif
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
