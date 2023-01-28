{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
@if(backpack_user()->hasRole('Customer') || backpack_user()->hasRole('Super Admin'))

@else
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@endif

@if(backpack_user()->can('Manage Contact requests'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('contact-request') }}"><i class="nav-icon la la-paper-plane"></i> Contact requests</a></li>
@endif

@if(backpack_user()->can('View Rates'))
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('rate') }}"><i class="nav-icon la la-chart-line"></i> Rates</a></li>
@endif

@if(backpack_user()->can('View Company types') || backpack_user()->can('View Legal statuses') || backpack_user()->can('View Countries') || backpack_user()->can('View Cities') || backpack_user()->can('View States') || backpack_user()->can('View Companies') || backpack_user()->can('View Auctions') || backpack_user()->can('View Auction locations') || backpack_user()->can('View Cargo types') || backpack_user()->can('View Ports') || backpack_user()->can('View Departments') || backpack_user()->can('View Branches') || backpack_user()->can('View Loading statuses') || backpack_user()->can('View Order statuses') || backpack_user()->can('View Order types') || backpack_user()->can('View Locations'))
    <!-- Basic Setup -->
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-tools"></i> Basic Setup</a>
        <ul class="nav-dropdown-items">
            @if(backpack_user()->can('View Company types'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('company-type') }}"><i class="nav-icon la la-building"></i> Company types</a></li>
            @endif
            @if(backpack_user()->can('View Legal statuses'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('legal-status') }}"><i class="nav-icon la la-file-contract"></i> Legal statuses</a></li>
            @endif
            @if(backpack_user()->can('View Countries'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('country') }}"><i class="nav-icon la la-globe"></i> Countries</a></li>
            @endif
            @if(backpack_user()->can('View States'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('state') }}"><i class="nav-icon la la-landmark"></i> States</a></li>
            @endif
            @if(backpack_user()->can('View Cities'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('city') }}"><i class="nav-icon la la-globe"></i> Cities</a></li>
            @endif
            @if(backpack_user()->can('View Companies'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('company') }}"><i class="nav-icon la la-building"></i> Companies</a></li>
            @endif
            @if(backpack_user()->can('View Departments'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('department') }}"><i class="nav-icon la la-city"></i> Departments</a></li>
            @endif
            @if(backpack_user()->can('View Branches'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('branch') }}"><i class="nav-icon la la-city"></i> Branches</a></li>
            @endif
            @if(backpack_user()->can('View Auctions'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('auction') }}"><i class="nav-icon la la-chart-area"></i> Auctions</a></li>
            @endif
            @if(backpack_user()->can('View Auction locations'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('auction-location') }}"><i class="nav-icon la la-map-marker-alt"></i> Auction locations</a></li>
            @endif
            @if(backpack_user()->can('View Cargo types'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('cargo-type') }}"><i class="nav-icon la la-truck-loading"></i> Cargo types</a></li>
            @endif
            @if(backpack_user()->can('View Ports'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('port') }}"><i class="nav-icon la la-ship"></i> Ports</a></li>
            @endif
            @if(backpack_user()->can('View Loading statuses'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('loading-status') }}"><i class="nav-icon la la-dolly"></i> Loading statuses</a></li>
            @endif
            @if(backpack_user()->can('View Order statuses'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-status') }}"><i class="nav-icon la la-list-alt"></i> Order statuses</a></li>
            @endif
            @if(backpack_user()->can('View Order types'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-type') }}"><i class="nav-icon la la-car-alt"></i> Order types</a></li>
            @endif
            @if(backpack_user()->can('View Payment methods'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('payment-method') }}"><i class="nav-icon la la-cc-visa"></i> Payment methods</a></li>
            @endif
            @if(backpack_user()->can('View Locations'))
                <li class="nav-item"><a class="nav-link" href="{{ backpack_url('location') }}"><i class="nav-icon la la-map-marker-alt"></i> Locations</a></li>
            @endif
        </ul>
    </li>
@endif
@if(backpack_user()->can('View Orders'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('order') }}"><i class="nav-icon la la-clipboard-list"></i> Orders</a></li>
@endif
@if(backpack_user()->can('View General Information') || backpack_user()->can('View Vehicles') || backpack_user()->can('View Inspections') || backpack_user()->can('View Services') || backpack_user()->can('View Documents') || backpack_user()->can('View Notes') || backpack_user()->can('View Parts') || backpack_user()->can('View Addon services') || backpack_user()->can('View Insurances'))
<!-- Orders -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-clipboard-list"></i> Orders</a>
    <ul class="nav-dropdown-items">
        @if(backpack_user()->can('View Inspections'))
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('inspection') }}"><i class="nav-icon la la-clipboard-check"></i> Inspections</a></li>
        @endif
        @if(backpack_user()->can('View Services'))
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('service') }}"><i class="nav-icon la la-list-ul"></i> Services</a></li>
        @endif
        @if(backpack_user()->can('View Documents'))
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('document') }}"><i class="nav-icon la la-file-alt"></i> Documents</a></li>
        @endif
        @if(backpack_user()->can('View Notes'))
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('note') }}"><i class="nav-icon la la-comment-alt"></i> Notes</a></li>
        @endif
        @if(backpack_user()->can('View Parts'))
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('part') }}"><i class="nav-icon la la-cogs"></i> Parts</a></li>
        @endif
        @if(backpack_user()->can('View Addon services'))
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('addon-service') }}"><i class="nav-icon la la-plus-circle"></i> Addon services</a></li>
        @endif
        @if(backpack_user()->can('View Insurances'))
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('insurance') }}"><i class="nav-icon la la-car-crash"></i> Insurances</a></li>
        @endif
    </ul>
</li>
@endif

@if(backpack_user()->can('View Invoices'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('invoice') }}"><i class="nav-icon la la-file-invoice-dollar"></i> Invoices</a></li>
@endif

@if(backpack_user()->can('View Payments'))
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('payment') }}"><i class="nav-icon la la-hand-holding-usd"></i> Payments</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('fee') }}"><i class="nav-icon la la-hand-holding-usd"></i> Fees</a></li>
@endif

@if(backpack_user()->can('Manage Logs'))
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Logs</a></li>
@endif

@if(backpack_user()->can('Manage Authentication'))
    <!-- Users, Roles, Permissions -->
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        </ul>
    </li>
@endif

<li class="nav-item"><a class="nav-link" href="{{url('')}}/set-language/{{__('content.lang2')}}"><i class="nav-icon la la-language"></i> <span>{{__('content.lang')}}</span></a></li>
