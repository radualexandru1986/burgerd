@extends('auth.app')
@section('content')
<div class="container-xl">
    <h1 class="display-2">Dashboard</h1>
    <hr>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$orders->count()}} Orders</h5>
            <h6 class="card-subtitle mb-2 text-muted">For the day</h6>
            <p class="card-text">
              £ {{$orders->sum('total')}}
            </p>
            <div class="text-center">
                <a href="{{route('admin.orders')}}" class="card-link ">Go to orders</a>
            </div>
        </div>
    </div>
{{--    <table class="table">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">#</th>--}}
{{--            <th scope="col">Customer</th>--}}
{{--            <th scope="col">Total</th>--}}
{{--            <th scope="col">Status</th>--}}
{{--            <th scope="col">Created @</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($orders as $order)--}}
{{--            <tr>--}}
{{--                <th scope="row">{{$order->id}}</th>--}}
{{--                <td>{{$order->customer->phone}}</td>--}}
{{--                <td>£{{$order->total}}</td>--}}
{{--                <td>{{$order->status}}</td>--}}
{{--                <td>{{$order->created_at}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}

</div>
@endsection
