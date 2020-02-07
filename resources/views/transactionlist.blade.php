@extends('Layout.main')

@section('content')
    @if (count($lists) <= 0)
        <h1>There is no transaction</h1>
    @else    
        <div class="container">
            <br>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->user->email}}</td>
                            <td>{{$data->date_time}}</td>
                            <td>{{$data->status}}</td>
                            <td><a href="/transactiondetail/{{$data->id}}" class="btn btn-primary">Detail</a></td>
                            <td><a href="/deletefromtransaction/{{$data->id}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>    
            </table>
        </div>
    @endif
@endsection