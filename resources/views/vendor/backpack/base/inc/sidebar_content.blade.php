{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Logs</a></li>

<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('contact-request') }}"><i class="nav-icon la la-question"></i> Contact requests</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('company-type') }}"><i class="nav-icon la la-question"></i> Company types</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('legal-status') }}"><i class="nav-icon la la-question"></i> Legal statuses</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('country') }}"><i class="nav-icon la la-question"></i> Countries</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('city') }}"><i class="nav-icon la la-question"></i> Cities</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('state') }}"><i class="nav-icon la la-question"></i> States</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('company') }}"><i class="nav-icon la la-question"></i> Companies</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('auction') }}"><i class="nav-icon la la-question"></i> Auctions</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('auction-location') }}"><i class="nav-icon la la-question"></i> Auction locations</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('cargo-type') }}"><i class="nav-icon la la-question"></i> Cargo types</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('port') }}"><i class="nav-icon la la-question"></i> Ports</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('rate') }}"><i class="nav-icon la la-question"></i> Rates</a></li>