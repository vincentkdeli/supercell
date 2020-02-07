@extends('Layout.main')

@section('content')    
    <div class="container">
        <br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Phone</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $data)
                    <tr>
                        <td>{{$data->phone->name}}</td>
                        <td>{{$data->phone->price}}</td>
                        <td>{{$data->qty}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="pull-left">
            Total Quantity: {{$totalqty}}
            <br>
            Grand Total: {{$grandtotal}}
        </div>

        @if (Auth::user()->role == 'user')
            <div class="pull-right">
                <a href="/transactionhistory" class="btn btn-primary">Back</a>
            </div>    
        @else
            <div class="pull-right">
                <a href="/transactionlist" class="btn btn-primary">Back</a>
            </div>    
        @endif
        
        <div class="clearfix"></div>
    </div>
@endsection