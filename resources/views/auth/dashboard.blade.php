@extends('auth.app')
@section('content')
<div class="container-xl">
    <h1 class="display-2">Dashboard</h1>
    <hr>
    <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="card-body text-center">
                <h2 class="card-title text-center">{{$todayOrders->count()}} Orders</h2>
                <p class="card-subtitle mb-2 text-muted">For today</p>
                <hr>
                <h2 class="card-text text-center">
                    £ {{$todayOrders->sum('total')}}
                </h2>
                <div class="text-center">
                    <a href="{{route('admin.orders')}}" class="card-link ">Go to orders</a>
                </div>
            </div>
        </div>
        <div class="card mx-auto" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$orders->count()}} Orders</h5>
                <h6 class="card-subtitle mb-2 text-muted">All orders </h6>
                <p class="card-text">
                    £ {{$orders->sum('total')}}
                </p>
                <div class="text-center">
                    <a href="{{route('admin.orders')}}" class="card-link ">Go to orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
