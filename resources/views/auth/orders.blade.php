@extends('auth.app')
@section('content')
    <div class="container-xl">
        <h1 class="display-2">Orders</h1>
        <hr>
        <div class="container-fluid p-0 my-5 bg-light">
                <button class="btn btn-lg btn-dark w-auto">Create Order <i class="bi bi-plus-circle-fill"></i> </button>
        </div>
        <h4>Pending orders</h4>
        <div class="accordion" id="accordionExample">
            @foreach($pendingOrders as $order)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{$order->id}}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$order->id}}" aria-expanded="true" aria-controls="collapse-{{$order->id}}">
                            <div class="row w-100">
                                <div class="col-4">
                                    <strong>#{{$order->id}}</strong>
                                </div>
                                <div class="col-4">
                                    <span class="mx-auto badge bg-warning">{{$order->status->name}}</span>
                                </div>
                                <div class="col-4">
                                    <span class="mx-auto badge bg-danger">£ {{$order->total}}</span>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse-{{$order->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row my-3">
                                <h4><i class="bi bi-telephone-fill"></i> : {{$order->customer->phone}}</h4>
                                <h4><i class="bi bi-geo-alt"></i> : {{$order->customer->address->fullAddress()}}</h4>
                            </div>
                            <div class="row">
                                @foreach($order->items as $product)
                                    <div class="card col-4" >
                                        <div class="card-body">
                                            <h3 class="card-title">#{{$product->item->id}} | <strong>{{$product->item->name}}</strong> </h3>
                                            <h5>{{$product->drink()}}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row mt-5 bg-light">
                                <div class="col-4">
                                    <a href="/admin/orders/{{$order->id}}/finish" class="btn btn-success w-100"> Finish Order </a>
                                </div>

                                <div class="col-4">
                                    <button class="btn btn-info w-100"> For Kitchen </button>
                                </div>

                                <div class="col-4">
                                    <button class="btn btn-danger w-100"> Cancel Order </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <hr>

        <h4>Today's Orders</h4>
        <div class="accordion" id="accordionExample">
            @foreach($finishedOrders as $order)
                <div class="accordion-item">
                <h2 class="accordion-header" id="heading-{{$order->id}}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$order->id}}" aria-expanded="true" aria-controls="collapse-{{$order->id}}">
                     <div class="row w-100">
                         <div class="col-4">
                             <strong>#{{$order->id}}</strong>
                         </div>
                         <div class="col-4">
                             <span class="mx-auto badge bg-success">{{$order->status->name}}</span>
                         </div>
                         <div class="col-4">
                             <span class="mx-auto badge bg-danger">£ {{$order->total}}</span>
                         </div>
                     </div>
                    </button>
                </h2>
                <div id="collapse-{{$order->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row my-3">
                            <h4><i class="bi bi-telephone-fill"></i> : {{$order->customer->phone}}</h4>
                            <h4><i class="bi bi-geo-alt"></i> : {{$order->customer->address->fullAddress()}}</h4>
                        </div>
                        <div class="row">
                            @foreach($order->items as $product)
                                <div class="card col-4" >
                                    <div class="card-body">
                                        <h3 class="card-title">#{{$product->item->id}} | <strong>{{$product->item->name}}</strong> </h3>
                                        <h5>{{$product->drink()}}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row mt-5 bg-light">
                            <div class=" offset-8 col-4">
                                <button class="btn btn-danger w-100"> Cancel Order </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
