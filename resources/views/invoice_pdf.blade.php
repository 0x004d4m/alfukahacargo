<!DOCTYPE html>
<html>
    <head>
        <title>Invoice PDF</title>
        <style>
            @page { margin: 25px; }
            body { margin: 25px; }
        </style>
    </head>
    <body style="text-align: center; font-size: 14px;">
        <img src="{{public_path('template/img/new/logoPDF.png')}}" height="100px" width="300px">
        <h2 style=" font-size: 25px;"><span style="color:#fc0f37">4403</span> Business Ln, Plant City, FL <span style="color:#fc0f37">33566</span></h2>
        <br>
        <table style="float: right; margin-bottom: 3%" width="100%">
            <tr>
                <td style="background-color: lightgray; margin:0%; padding:0%;" colspan="2">INVOICE #{{$Invoice->number}}</td>
                <td style="background-color: lightgray; margin:0%; padding:0%;" colspan="2">DATE {{$Carbon->format('Y-m-d')}}</td>
                <td style="background-color: lightgray; margin:0%; padding:0%;" colspan="2">CUSTOMER REF #{{$Invoice->customer->id}}</td>
                <td style="background-color: lightgray; margin:0%; padding:0%;" colspan="2">PAGE 1</td>
            </tr>
        </table>
        <br>
        <br>
        <table width="100%" style="border-collapse: collapse;">
            @if ($Invoice->customer)
                <tr>
                    <th style="background-color: #fc0f37; color:white;text-align: left!important;" colspan="4">BILL TO:</th>
                    <th style="background-color: #fc0f37; color:white;text-align: left!important;" colspan="2">ADDITIONAL INFORMATION:</th>
                </tr>
                <tr>
                    <td colspan="4">
                        {{$Invoice->customer->name_en}}
                        @if ($Invoice->customer->country)<br>{{$Invoice->customer->country->name_en}}@endif @if ($Invoice->customer->state) - {{$Invoice->customer->state->name_en}} @endif @if ($Invoice->customer->city) - {{$Invoice->customer->city->name_en}} @endif
                        @if ($Invoice->customer->companyType) <br> {{$Invoice->customer->companyType->name_en}} @endif
                    </td>
                    <td colspan="2" rowspan="4"></td>
                </tr>
            @endif
            @if ($Invoice->issuedBy)
                <tr>
                    <th style="background-color: #fc0f37; color:white;text-align: left!important;" colspan="4">SHIPPER:</th>
                </tr>
                <tr>
                    <td colspan="4">
                        {{$Invoice->issuedBy->name_en}}
                        @if ($Invoice->issuedBy->country)<br>{{$Invoice->issuedBy->country->name_en}}@endif @if ($Invoice->issuedBy->state) - {{$Invoice->issuedBy->state->name_en}} @endif @if ($Invoice->issuedBy->city) - {{$Invoice->issuedBy->city->name_en}} @endif
                        @if ($Invoice->issuedBy->companyType) <br> {{$Invoice->issuedBy->companyType->name_en}} @endif
                    </td>
                </tr>
            @endif
            @if ($Invoice->customer)
                <tr>
                    <th style="background-color: #fc0f37; color:white;text-align: left!important;" colspan="4">CONSIGNEE:</th>
                </tr>
                <tr>
                    <td colspan="4">
                        {{$Invoice->customer->name_en}}
                        @if ($Invoice->customer->country)<br>{{$Invoice->customer->country->name_en}}@endif @if ($Invoice->customer->state) - {{$Invoice->customer->state->name_en}} @endif @if ($Invoice->customer->city) - {{$Invoice->customer->city->name_en}} @endif
                        @if ($Invoice->customer->companyType) <br> {{$Invoice->customer->companyType->name_en}} @endif
                    </td>
                </tr>
            @endif
            <tr style="background-color: #fc0f37; color:white;">
                <td>QTY</td>
                <td>CARGO TYPE</td>
                <td>VEHICLE YEAR</td>
                <td>MAKE</td>
                <td>MODEL</td>
                <td>VIN</td>
            </tr>
            <tr>
                <td>1</td>
                <td>{{$Invoice->issuedBy->companyType->name_en}}</td>
                <td>{{$Invoice->order->year}}</td>
                <td>{{$Invoice->order->make}}</td>
                <td>{{$Invoice->order->model}}</td>
                <td>{{$Invoice->order->vin_number}}</td>
            </tr>
            @if (count($Invoice->fees)>0 || count($Invoice->payments)>0)
                <tr style="background-color: #fc0f37; color:white;">
                    <td>#</td>
                    <td>AMOUNT</td>
                    <td>PAIED AT</td>
                    <td>PAYMENT METHOD</td>
                    <td>PAYMENT TYPE</td>
                    <td>NOTE</td>
                </tr>
                @foreach ($Invoice->fees as $Fee)
                    <tr>
                        <td>{{$Fee->number}}</td>
                        <td>{{$Fee->amount}}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>Fee</td>
                        <td>{{$Payment->memo}}</td>
                    </tr>
                @endforeach
                @foreach ($Invoice->payments as $Payment)
                    <tr>
                        <td>{{$Payment->number}}</td>
                        <td>{{$Payment->amount}}</td>
                        <td>{{$Payment->paid_at}}</td>
                        <td>{{$Payment->paymentMethod->name_en}}</td>
                        <td>Payment</td>
                        <td>{{$Payment->memo}}</td>
                    </tr>
                @endforeach
            @endif

            <tr style="background-color: black; color:white;">
                <td colspan="3"></td>
                <td colspan="3">INVOICE TOTAL (USD): {{$Invoice->amount}}</td>
            </tr>
        </table>
        <br>
        <table width="100%" style="border-collapse: collapse; border: 1px solid;">
            <tr style="background-color: #fc0f37; color:white;border: 1px solid;">
                <td colspan="4">PAYMENT INSTRUCTIONS</td>
                <td colspan="4">INVOICE SUMMARY</td>
            </tr>
            <tr>
                <td colspan="4">{{$Invoice->payment_term}}</td>
                <td colspan="4">INVOICE #{{$Invoice->number}}</td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td colspan="4">CUSTOMER NAME: {{$Invoice->customer->name_en}}</td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td colspan="4">AMOUNT DUE (USD):{{$Invoice->amount_due}}</td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td colspan="4">INVOICE DATE: {{$Invoice->created_at}}</td>
            </tr>
            <tr style="background-color: black; color:white;">
                <td colspan="4"></td>
                <td colspan="4">DUE DATE: {{$Invoice->due_date}}</td>
            </tr>
        </table>
    </body>
</html>
