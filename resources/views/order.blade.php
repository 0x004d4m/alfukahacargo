@extends('website.layout.main')
@section('title', __('content.home'))
@section('content')
    <div class="container-fluid">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0" style="min-height: 400px;">
                @if (isset($Order))
                    <table>
                        <tr>
                            <th class="h3">{{__('order.vin_number')}}: {{$Order->vehicle->vin_number}}</th>
                            <th>{{__('order.orderStatus')}}: {{$Order->orderStatus->name}}</th>
                            <th>{{__('order.orderType')}}: {{$Order->orderType->name}}</th>
                        </tr>
                    </table>
                    @if ($Order->vehicle)
                        <div class="col-lg-3">
                            <h3>{{__('order.Vehicle')}}</h3>
                            <p>{{__('order.year')}}: {{$Order->vehicle->year}}</p>
                            <p>{{__('order.make')}}: {{$Order->vehicle->make}}</p>
                            <p>{{__('order.model')}}: {{$Order->vehicle->model}}</p>
                            <p>{{__('order.title')}}: {{(count($Order->documents)>0)?'yes':'no'}}</p>
                            <p>{{__('order.department')}}: {{$Order->vehicle->department?->name}}</p>
                        </div>
                    @endif
                    @if ($Order->generalInformation)
                        <div class="col-lg-3">
                            <h3>{{__('order.General Information')}}</h3>
                            <p>{{__('order.order_date')}}: {{$Order->generalInformation->order_date}}</p>
                            <p>{{__('order.received_date')}}: {{$Order->generalInformation->received_date}}</p>
                            <p>{{__('order.shipping_line')}}: {{$Order->generalInformation->shipping_line}}</p>
                            <p>{{__('order.branch')}}: {{$Order->generalInformation->branch?->name}}</p>
                            <p>{{__('order.container')}}: {{$Order->generalInformation->container?->name}}</p>
                            <p>{{__('order.booking_number')}}: {{$Order->generalInformation->booking_number}}</p>
                            <p>{{__('order.finalPort')}}: {{$Order->generalInformation->finalPort?->name}}</p>
                            <p>{{__('order.finalCountry')}}: {{$Order->generalInformation->finalCountry?->name}}</p>
                            <p>{{__('order.finalState')}}: {{$Order->generalInformation->finalState?->name}}</p>
                            <p>{{__('order.finalCity')}}: {{$Order->generalInformation->finalCity?->name}}</p>
                        </div>
                    @endif
                    @if (count($Images)>0)
                        <div class="col-lg-6">
                            <h3>{{__('order.Images')}}</h3>
                            @foreach ($Order->images as $image)
                                <a href="{{url($image->image)}}" target="_blank"><img src="{{url($image->image)}}" style="max-height: 50px; width: auto; border-radius: 3px;"></a>
                            @endforeach
                        </div>
                    @endif
                @else
                    <div class="col-lg-12 text-center">
                        {{__('order.No Order With That Number')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
