@extends('website.layout.main')
@section('title', __('content.home'))
@section('content')
    <div class="container-fluid">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0" style="min-height: 400px;">
                @if (isset($Order))
                    <table>
                        <tr>
                            <th class="h3">{{__('order.vin_number')}}: {{$Order->vin_number}}</th>
                            <th>{{__('order.orderStatus')}}: {{$Order->orderStatus->name}}</th>
                            <th>{{__('order.orderType')}}: {{$Order->orderType->name}}</th>
                        </tr>
                    </table>
                    @if ($Order)
                        <div class="col-lg-3">
                            <h3>{{__('order.Vehicle')}}</h3>
                            <p>{{__('order.year')}}: {{$Order->year}}</p>
                            <p>{{__('order.make')}}: {{$Order->make}}</p>
                            <p>{{__('order.model')}}: {{$Order->model}}</p>
                            <p>{{__('order.title')}}: {{(count($Order->documents)>0)?'yes':'no'}}</p>
                            <p>{{__('order.department')}}: {{$Order->department?->name}}</p>
                        </div>
                    @endif
                    @if ($Order)
                        <div class="col-lg-3">
                            <h3>{{__('order.General Information')}}</h3>
                            <p>{{__('order.order_date')}}: {{$Order->order_date}}</p>
                            <p>{{__('order.received_date')}}: {{$Order->received_date}}</p>
                            <p>{{__('order.shipping_line')}}: {{$Order->shipping_line}}</p>
                            <p>{{__('order.branch')}}: {{$Order->branch?->name}}</p>
                            <p>{{__('order.container')}}: {{$Order->container_number}}</p>
                            <p>{{__('order.booking_number')}}: {{$Order->booking_number}}</p>
                            <p>{{__('order.finalPort')}}: {{$Order->finalPort?->name}}</p>
                            <p>{{__('order.finalCountry')}}: {{$Order->finalCountry?->name}}</p>
                            <p>{{__('order.finalState')}}: {{$Order->finalState?->name}}</p>
                            <p>{{__('order.finalCity')}}: {{$Order->finalCity?->name}}</p>
                        </div>
                    @endif
                    @if (count(json_decode($Order->images))>0)
                        <div class="col-lg-6">
                            <h3>{{__('order.Images')}}</h3>
                            <div class="row">
                                @foreach (json_decode($Order->images) as $image)
                                    <div class="col-2 mb-2">
                                        <a href="{{url(str_replace('public','storage',$image))}}" target="_blank"><img src="{{url(str_replace('public','storage',$image))}}" style="max-height: 50px; width: auto; border-radius: 3px;"></a>
                                    </div>
                                @endforeach
                            </div>
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
