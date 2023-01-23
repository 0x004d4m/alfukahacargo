@extends('website.layout.main')
@section('title', __('content.home'))
@section('content')
    <div class="container-fluid">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0" style="min-height: 400px;">
                @if (isset($Order))
                    <table>
                        <tr>
                            <th class="h3">{{__('order.orderNo')}}: {{$Order->booking_number}}</th>
                            <th>{{__('order.orderStatus')}}: {{$Order->orderStatus->name}}</th>
                            <th>{{__('order.orderType')}}: {{$Order->orderType->name}}</th>
                        </tr>
                    </table>
                    @if ($Order->generalInformation)
                        <div class="col-lg-3">
                            <h3>{{__('order.General Information')}}</h3>
                            <p>{{__('order.order_date')}}: {{$Order->generalInformation->order_date}}</p>
                            <p>{{__('order.received_date')}}: {{$Order->generalInformation->received_date}}</p>
                            <p>{{__('order.shipping_line')}}: {{$Order->generalInformation->shipping_line}}</p>
                            <p>{{__('order.branch')}}: {{$Order->generalInformation->branch?->name}}</p>
                            <p>{{__('order.container')}}: {{$Order->generalInformation->container?->name}}</p>
                            <p>{{__('order.finalPort')}}: {{$Order->generalInformation->finalPort?->name}}</p>
                            <p>{{__('order.finalCountry')}}: {{$Order->generalInformation->finalCountry?->name}}</p>
                            <p>{{__('order.finalState')}}: {{$Order->generalInformation->finalState?->name}}</p>
                        </div>
                        <div class="col-lg-3">
                            <p>{{__('order.finalCity')}}: {{$Order->generalInformation->finalCity?->name}}</p>
                            <p>{{__('order.company')}}: {{$Order->generalInformation->company?->name}}</p>
                            <p>{{__('order.consignedTo')}}: {{$Order->generalInformation->consignedTo?->name}}</p>
                            <p>{{__('order.seller')}}: {{$Order->generalInformation->seller?->name}}</p>
                            <p>{{__('order.sale_origin')}}: {{$Order->generalInformation->sale_origin}}</p>
                            <p>{{__('order.auction')}}: {{$Order->generalInformation->auction?->name}}</p>
                            <p>{{__('order.country')}}: {{$Order->generalInformation->country?->name}}</p>
                            <p>{{__('order.state')}}: {{$Order->generalInformation->state?->name}}</p>
                            <p>{{__('order.city')}}: {{$Order->generalInformation->city?->name}}</p>
                        </div>
                    @endif
                    @if ($Order->vehicle)
                        <div class="col-lg-3">
                            <h3>{{__('order.Vehicle')}}</h3>
                            <p>{{__('order.vin_number')}}: {{$Order->vehicle->vin_number}}</p>
                            <p>{{__('order.year')}}: {{$Order->vehicle->year}}</p>
                            <p>{{__('order.make')}}: {{$Order->vehicle->make}}</p>
                            <p>{{__('order.model')}}: {{$Order->vehicle->model}}</p>
                            <p>{{__('order.type')}}: {{$Order->vehicle->type}}</p>
                            <p>{{__('order.order_parts')}}: {{$Order->vehicle->order_parts==0?'No':'Yes'}}</p>
                            <p>{{__('order.order_parts_note')}}: {{$Order->vehicle->order_parts_note}}</p>
                            <p>{{__('order.Vehicle_for_cutting')}}: {{$Order->vehicle->Vehicle_for_cutting==0?'No':'Yes'}}</p>
                        </div>
                        <div class="col-lg-3">
                            <p>{{__('order.vehicle_for_cutting_note')}}: {{$Order->vehicle->vehicle_for_cutting_note}}</p>
                            <p>{{__('order.department')}}: {{$Order->vehicle->department?->name}}</p>
                            <p>{{__('order.note_to_department')}}: {{$Order->vehicle->note_to_department}}</p>
                        </div>
                    @endif
                    <hr>
                    @if (count($Order->inspections)>0)
                        <div class="col-lg-6">
                            <h3>{{__('order.Inspections')}}</h3>
                            <table class="table">
                                <tr>
                                    <th>{{__('order.color')}}</th>
                                    <th>{{__('order.damage')}}</th>
                                    <th>{{__('order.new')}}</th>
                                    <th>{{__('order.keys')}}</th>
                                    <th>{{__('order.running')}}</th>
                                    <th>{{__('order.wheels')}}</th>
                                    <th>{{__('order.airbag')}}</th>
                                    <th>{{__('order.radio')}}</th>
                                </tr>
                                @foreach ($Order->inspections as $inspection)
                                    <tr>
                                        <td>{{$inspection->color}}</td>
                                        <td>{{$inspection->damage}}</td>
                                        <td>{{$inspection->new}}</td>
                                        <td>{{$inspection->keys}}</td>
                                        <td>{{$inspection->running}}</td>
                                        <td>{{$inspection->wheels}}</td>
                                        <td>{{$inspection->airbag}}</td>
                                        <td>{{$inspection->radio}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    @if (count($Order->services)>0)
                        <div class="col-lg-6">
                            <h3>{{__('order.Service')}}</h3>
                            <table class="table">
                                <tr>
                                    <th>{{__('order.date')}}</th>
                                    <th>{{__('order.customer')}}</th>
                                    <th>{{__('order.billedBy')}}</th>
                                    <th>{{__('order.name')}}</th>
                                    <th>{{__('order.quantity')}}</th>
                                    <th>{{__('order.amount')}}</th>
                                    <th>{{__('order.invoice')}}</th>
                                </tr>
                                @foreach ($Order->services as $service)
                                    <tr>
                                        <td>{{$service->date}}</td>
                                        <td>{{$service->customer->name}}</td>
                                        <td>{{$service->billedBy->name}}</td>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->quantity}}</td>
                                        <td>{{$service->amount}}</td>
                                        <td><a href="{{$service->invoice}}" target="_blank">View</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    @if (count($Order->documents)>0)
                        <div class="col-lg-6">
                            <h3>{{__('order.Documents')}}</h3>
                            <table class="table">
                                <tr>
                                    <th>{{__('order.title')}}</th>
                                    <th>{{__('order.country')}}</th>
                                    <th>{{__('order.state')}}</th>
                                    <th>{{__('order.city')}}</th>
                                    <th>{{__('order.title_type')}}</th>
                                    <th>{{__('order.title_received_date')}}</th>
                                    <th>{{__('order.bill_of_sale')}}</th>
                                    <th>{{__('order.copy_of_original_title')}}</th>
                                </tr>
                                @foreach ($Order->documents as $document)
                                    <tr>
                                        <td>{{$document->title}}</td>
                                        <td>{{$document->country->name}}</td>
                                        <td>{{$document->state->name}}</td>
                                        <td>{{$document->city->name}}</td>
                                        <td>{{$document->title_type}}</td>
                                        <td>{{$document->title_received_date}}</td>
                                        <td>{{$document->bill_of_sale}}</td>
                                        <td><a href="{{$document->copy_of_original_title}}" target="_blank">View</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    @if (count($Order->notes)>0)
                        <div class="col-lg-6">
                            <h3>{{__('order.Notes')}}</h3>
                            <table class="table">
                                <tr>
                                    <th>{{__('order.date')}}</th>
                                    <th>{{__('order.note')}}</th>
                                </tr>
                                @foreach ($Order->notes as $note)
                                <tr>
                                    <td>{{$note->date}}</td>
                                    <td>{{$note->note}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    @if (count($Order->parts)>0)
                        <div class="col-lg-6">
                            <h3>{{__('order.Parts')}}</h3>
                            <table class="table">
                                <tr>
                                    <th>{{__('order.order_parts_note')}}</th>
                                    <th>{{__('order.ship_parts_with_vehicle')}}</th>
                                    <th>{{__('order.branch')}}</th>
                                </tr>
                                @foreach ($Order->parts as $part)
                                    <tr>
                                        <td>{{$part->order_parts_note}}</td>
                                        <td>{{$part->ship_parts_with_vehicle==0?'No':'Yes'}}</td>
                                        <td>{{$part->branch->name}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    @if (count($Order->addonServices))
                        <div class="col-lg-6">
                            <h3>{{__('order.Addon Services')}}</h3>
                            <table class="table">
                                <tr>
                                    <th>{{__('order.name')}}</th>
                                    <th>{{__('order.price')}}</th>
                                    <th>{{__('order.completed')}}</th>
                                    <th>{{__('order.note')}}</th>
                                </tr>
                                @foreach ($Order->addonServices as $addonService)
                                    <tr>
                                        <td>{{$addonService->name}}</td>
                                        <td>{{$addonService->price}}</td>
                                        <td>{{$addonService->completed==0?'No':'Yes'}}</td>
                                        <td>{{$addonService->note}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    @if (count($Order->insurances)>0)
                        <div class="col-lg-6">
                            <h3>{{__('order.Insurances')}}</h3>
                            <table class="table">
                                <tr>
                                    <th>{{__('order.name')}}</th>
                                    <th>{{__('order.total_loss')}}</th>
                                    <th>{{__('order.full_cover')}}</th>
                                </tr>
                                @foreach ($Order->insurances as $insurance)
                                    <tr>
                                        <td>{{$insurance->name}}</td>
                                        <td>{{$insurance->total_loss}}</td>
                                        <td>{{$insurance->full_cover}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                    @if (count($Images)>0)
                        <div class="col-lg-6">
                            <h3>{{__('order.Images')}}</h3>
                            @foreach ($Images as $key=>$group)
                                {{ App\Models\ImageType::where('id', $key)->first()->name }}<br>
                                @foreach ($group as $image)
                                    <a href="{{url($image->image)}}" target="_blank"><img src="{{url($image->image)}}" style="max-height: 25px; width: auto; border-radius: 3px;"></a>
                                @endforeach
                                <br>
                                <br>
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
