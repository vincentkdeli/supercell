@extends('Layout.main')

@section('content')
    @if (count($data) <= 0)
        <h1>Your cart has no item!</h1>
    @else
        <div class="container">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($data); $i++)
                        <tr>
                            <td><img src="/images/{{$phones[$i][0]['image']}}" alt="img" class="img-thumbnail" style="widthL 150px; height: 150px;"></td>
                            <td>{{$phones[$i][0]['name']}}</td>
                            <td>{{$data[$i]['qty']}}</td>
                            <td>{{$phones[$i][0]['price'] - ($phones[$i][0]['price'] * $phones[$i][0]['discount'] / 100)}}</td>
                            <td>{{$data[$i]['subtotal']}}</td>
                            <td><a href="/deletefromcart/{{$data[$i]['id']}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endfor
                </tbody>    
            </table>
        </div>
        <div class="container">
            <div class="pull-left">Total Quantity: {{$totalqty}} <br> Grand Total: {{$grandtotal}}</div>
            <div class="pull-right">
                <a href="/completepayment" class="btn btn-primary">Complete the Payment</a>
            </div>
            
            <div class="clearfix"></div>
        </div>
    @endif
@endsection