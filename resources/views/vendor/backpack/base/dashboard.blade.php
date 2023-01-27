@extends(backpack_view('blank'))
@section('content')
    @if(backpack_user()->hasRole('Customer') || backpack_user()->hasRole('Super Admin'))
        <script>
            window.location = '{{url('/admin/order')}}';
        </script>
    @else
        Welcome New User Please Contact Admin To Assign Customer Role And Company Details
    @endif
@endsection
