@extends('auth.app')
@section('content')
    <div class="container-xl">
        <h1 class="display-2">Orders History</h1>
        <hr>
        <div class="accordion" id="accordionExample">
            @foreach($orders as $month=>$order)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{$month}}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$month}}" aria-expanded="true" aria-controls="collapse-{{$month}}">
                            <div class="row w-100">
                                <div class="col-4">
                                    <strong>#{{$month}}</strong>
                                </div>
                                <div class="col-4">
                                    <span class="mx-auto badge bg-success">{{$order->count()}} orders</span>
                                </div>
                                <div class="col-4">
                                    <span class="mx-auto badge bg-dark">£
                                        {{ $order->reduce(function($cary, $item){ return $cary+$item['total'];}, 0) }}
                                    </span>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse-{{$month}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row my-3">
                                @foreach($order->groupBy(function($date){return \Carbon\Carbon::parse($date->created_at)->weekOfYear;})->sort() as $key=>$item)
                                    <h3 class="display-5 mt-5">
                                    Between - {{\Carbon\Carbon::now()->setIsoDate(2021, $key)->startOfWeek()->format('d M ')}} and
                                    {{\Carbon\Carbon::now()->setIsoDate(2021, $key)->endOfWeek()->format('d M')}}
                                    </h3>
                                    <div class="row">
                                        @foreach($item as $i)
                                            <div class="col-4 p-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title w-100 text-center m-0">  # {{$i->id}}</h5>
                                                        <hr>
                                                        <div>
                                                            <div>
                                                                <i class="bi bi-telephone"></i>
                                                                {{$i->customer->phone}}
                                                            </div>
                                                            <div>
                                                                <i class="bi bi-geo-alt"></i>
                                                                {{$i->customer->address->fullAddress()}}
                                                            </div>
                                                                <div>
                                                                    Customer Notified : {{$i->customerNotified()?'Yes':'No'}}
                                                                </div>
                                                            <br>
                                                            @foreach($i->items as $orderItem)
                                                                <p ><strong> {{$orderItem->item->name}}</strong> x {{$orderItem->quantity}} ( {{$orderItem->drink()}} )</p>
                                                            @endforeach
                                                            <h4>Total: £{{$i->total}}</h4>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3 m-auto">
                                                                <a href="{{route('admin.orders.customer', ['order_id'=>$i->id])}}" class="btn btn-dark w-100"> <i class="bi bi-printer"></i></a>
                                                            </div>
                                                            <div class="col-3 m-auto">
                                                                <a href="{{route('admin.orders.kitchen', ['order_id'=>$i->id])}}" class="btn btn-info w-100 "> K </a>
                                                            </div>
                                                            <div class="col-3 m-auto">
                                                                <form id="deleteOrderForm-{{$i->id}}" action="{{route('admin.orders.delete', ['order_id'=> $i->id])}}" method="post">
                                                                    @csrf
                                                                </form>
                                                                <button data-delete="{{$i->id}}" class="btn btn-light border-danger w-100 "><i class="bi bi-trash"></i></button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                            <div class="row mt-5 bg-light">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('head')
    <script>
        let orderDeleteButtons = document.querySelectorAll('button')
        orderDeleteButtons.forEach((button)=>{
            button.addEventListener('click', ()=>{
                if(button.dataset.delete) {
                    if(confirm('Are you sure you want to delete this order ? ')){
                        document.getElementById(`deleteOrderForm-${button.dataset.delete}`).submit()
                    }
                }
            })

        })
    </script>
@endpush
