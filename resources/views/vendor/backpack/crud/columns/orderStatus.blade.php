@if ($entry->status == 0)
    <span class="badge badge-warning text-white">Pending</span>
@endif

@if ($entry->status == 1)
    <span class="badge badge-success">Accepted</span>
@endif

@if ($entry->status == 2)
    <span class="badge badge-danger">Rejected</span>
@endif

@if ($entry->status == 3)
    <span class="badge badge-primary">ON Way</span>
@endif

@if ($entry->status == 4)
    <span class="badge badge-secondary">Finished</span>
@endif

@if ($entry->status == 5)
    <span class="badge badge-dark">Canceled By Customer</span>
@endif

@if ($entry->status == 6)
    <span class="badge badge-dark">Canceled By Driver</span>
@endif
