@if($entry->is_blocked == 0)
<a  href="javascript:void(0)" onclick="blockEntry({{ $entry->getKey() }})" class="btn btn-sm btn-link text-success" data-button-type="block"><i class="la la-user-slash"></i>Block</a>
@else
<a  href="javascript:void(0)" onclick="unblockEntry({{ $entry->getKey() }})" class="btn btn-sm btn-link text-danger" data-button-type="unblock"><i class="la la-user"></i>Unblock</a>
@endif

@push('after_scripts') @if (request()->ajax()) @endpush @endif
<script>
    function blockEntry(id) {
        $("[data-button-type=block]").unbind('click');
        swal({
            title: "{!! trans('backpack::base.warning') !!}",
            text: "Are you sure you want to block this customer?",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: false,
        }).then((value) => {
            if (value) {
                $.ajax({
                    url: "{{ url($crud->route.'/block') }}"+"/"+id,
                    type: 'PUT',
                    success: function(result) {
                        new Noty({
                            type: "success",
                            text: "<strong>Customer Blocked</strong><br>The customer has been blocked successfully."
                        }).show();
                        crud.table.draw(false);
                        $('.modal').modal('hide');
                    },
                    error: function(result) {
                        swal({
                        title: "NOT Blocked",
                        text: "There's been an error. Your customer might not have been blocked.",
                        icon: "error",
                        timer: 4000,
                        buttons: false,
                        });
                        crud.table.draw(false);
                    }
                });
            }
        });
    }

    function unblockEntry(id) {
        $("[data-button-type=unblock]").unbind('click');
        swal({
            title: "{!! trans('backpack::base.warning') !!}",
            text: "Are you sure you want to unblock this customer?",
            icon: "warning",
            buttons: ["Cancel", "Confirm"],
            dangerMode: true,
        }).then((value) => {
            if (value) {
                $.ajax({
                    url: "{{ url($crud->route.'/unblock') }}"+"/"+id,
                    type: 'PUT',
                    success: function(result) {
                        new Noty({
                            type: "success",
                            text: "<strong>Customer Unblocked</strong><br>The customer has been unblocked successfully."
                        }).show();
                        crud.table.draw(false);
                        $('.modal').modal('hide');
                    },
                    error: function(result) {
                        swal({
                        title: "NOT Unblocked",
                        text: "There's been an error. Your customer might not have been unblocked.",
                        icon: "error",
                        timer: 4000,
                        buttons: false,
                        });
                        crud.table.draw(false);
                    }
                });
            }
        });
    }
</script>
@if (!request()->ajax()) @endpush @endif
