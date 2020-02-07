@extends('Layout.main')

@section('content')
    @if (count($histories) <= 0)
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $header)
                        <tr>
                            <td>{{$header->id}}</td>
                            <td>{{$header->user->email}}</td>
                            <td>{{$header->date_time}}</td>
                            <td>{{$header->status}}</td>
                            <td><a href="/transactiondetail/{{$header->id}}" class="btn btn-primary">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>    
            </table>
        </div>
    @endif
@endsection