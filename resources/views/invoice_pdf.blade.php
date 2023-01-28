<!DOCTYPE html>
<html>
    <head>
        <title>Invoice PDF</title>
    </head>
    <body style="text-align: center">
        <img src="{{public_path('template/img/new/logoPDF.jpg')}}" style="width: 50%; hieght: 100%;">
        <br>
        <table width="100%">
            <tr>
                <th style="background-color: lightgray;">VIN Number</th>
                <td>{{ $Invoice->order->vin_number??"" }}</td>
                <th style="background-color: lightgray;">Number</th>
                <td>{{ $Invoice->number??"" }}</td>
            </tr>
            <tr>
                <th style="background-color: lightgray;">Issued By</th>
                <td>{{ $Invoice->issuedBy->name_en??"" }}</td>
                <th style="background-color: lightgray;">Branch</th>
                <td>{{ $Invoice->branch->name_en??"" }}</td>
            </tr>
            <tr>
                <th style="background-color: lightgray;">Payment Term</th>
                <td>{{ $Invoice->payment_term??"" }}</td>
                <th style="background-color: lightgray;">Due Date</th>
                <td>{{ $Invoice->issuedBy->name_en??"" }}</td>
            </tr>
            <tr>
                <th style="background-color: lightgray;">Customer</th>
                <td>{{ $Invoice->customer->name_en??"" }}</td>
                <th style="background-color: lightgray;">Customer Address</th>
                <td>{{ $Invoice->customer->country->name_en??"" }} - {{ $Invoice->customer->state->name_en??"" }} - {{ $Invoice->customer->city->name_en??"" }}</td>
            </tr>
            <tr>
                <th style="background-color: lightgray;">Amount</th>
                <td>{{ $Invoice->amount??"" }}</td>
                <th></th>
                <td></td>
            </tr>
            <tr>
                <th style="background-color: lightgray;">Amount Paid</th>
                <td>{{ $Invoice->amount_paid??"" }}</td>
                <th style="background-color: lightgray;">Amount Due</th>
                <td>{{ $Invoice->amount_due??"" }}</td>
            </tr>
        </table>
        <br><br><br>
        <h3>Fees</h3>
        <table width="100%">
            <tr style="background-color: lightgray;">
                <th>Number</th>
                <th>Amount</th>
                <th>Note</th>
            </tr>
            @foreach ($Invoice->fees as $Fee)
                <tr>
                    <td>{{$Fee->number??""}}</td>
                    <td>{{$Fee->amount??""}}</td>
                    <td>{{$Fee->memo??""}}</td>
                </tr>
            @endforeach
        </table>
        <br><br><br>
        <h3>Payments</h3>
        <table width="100%">
            <tr style="background-color: lightgray;">
                <th>Payment Method</th>
                <th>Number</th>
                <th>Paid At</th>
                <th>Amount</th>
                <th>Note</th>
            </tr>
            @foreach ($Invoice->payments as $Payment)
                <tr>
                    <td>{{$Payment->paymentMethod->name_ar??""}}</td>
                    <td>{{$Payment->number??""}}</td>
                    <td>{{$Payment->paid_at??""}}</td>
                    <td>{{$Payment->amount??""}}</td>
                    <td>{{$Payment->memo??""}}</td>
                </tr>
            @endforeach
        </table>
        <br><br><br>
        <footer>
            <p style="font-size: 10px">USA, info@alfukaha.com, info@alfukahacargo.com, +12164008927, 4403 Business Ln, Plant City, FL 33566</p>
            <p style="font-size: 10px">UAE, CARS AND AUCTIONS: uae@alfukaha.com, SHIPPING AND CARGO: uae@alfukahacargo.com</p>
            <p style="font-size: 10px">JORDAN, jordan@alfukahacargo.com, qusae@alfukaha.com, +962780600108, 15 ST FREE ZONE ZARQA</p>
            <p style="font-size: 10px">{{ $Carbon->format('Y-m-d H:i:s') }}</p>
        </footer>
    </body>
</html>
