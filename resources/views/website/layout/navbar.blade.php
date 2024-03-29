<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0" dir="ltr">
    <img class="navimg" src="{{url('template/img/new/logo.png')}}">
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        @if (false)
        @else
        <form action="/order" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="vin" placeholder="{{__('order.vin_number')}}"  required value="@if (Request::has('vin')){{Request::get('vin')}}@endif">
                <button class="btn btn-primary input-group-text" >
                    {{__('order.Search')}}
                </button>
            </div>
        </form>
        @endif
        <div class="navbar-nav ms-auto p-4 p-lg-0" dir="{{__('content.lang3')}}">
            @if (false)
            @else
            <a href="/#" class="nav-item nav-link active">{{__('content.home')}}</a>
            <a href="/#about" class="nav-item nav-link">{{__('content.about')}}</a>
            <a href="/#service" class="nav-item nav-link">{{__('content.services')}}</a>
            <a href="/#contact" class="nav-item nav-link">{{__('content.contact')}}</a>
            <a href="/admin" class="nav-item nav-link">{{__('content.login')}}</a>
            @endif
            <a href="/set-language/{{__('content.lang2')}}" class="nav-item nav-link">{{__('content.lang')}}</a>
        </div>
        <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>+12164008927</h4>
    </div>
</nav>
<!-- Navbar End -->
