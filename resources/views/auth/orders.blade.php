@extends('auth.app')
@section('content')
    <div class="container-xl">
        <h1 class="display-2">Orders</h1>
        <hr>
        <div class="container-fluid p-0 my-5 bg-light">
{{--                <button class="btn btn-lg btn-dark w-auto">Create Order <i class="bi bi-plus-circle-fill"></i> </button>--}}
        </div>
        <h4>Processing </h4>
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
                                    <a href="{{route('admin.orders.kitchen',['order_id'=>$order->id])}}" class="btn btn-info w-100"> For Kitchen </a>
                                </div>

                                <div class="col-4">
                                    <form class="deleteOrder" action="{{route('admin.orders.delete', ['order_id'=>$order->id])}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger w-100" type="submit" id="deleteOrderButton"> Delete Order </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <h4>Ready</h4>
        <div class="accordion" id="accordionExample">
            @foreach($finishedOrders as $order)
                <div class="accordion-item">
                <h2 class="accordion-header" id="heading-{{$order->id}}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$order->id}}" aria-expanded="true" aria-controls="collapse-{{$order->id}}">
                     <div class="row w-100">
                         <div class="col-3">
                             <strong>#{{$order->id}}</strong>
                         </div>
                         <div class="col-3">
                             <span class="mx-auto badge bg-success">{{$order->status->name}}</span>
                         </div>
                         <div class="col-3">
                             <span class="mx-auto badge bg-danger">£ {{$order->total}}</span>
                         </div>
                         @if($order->customerNotified())
                             <div class="col-3">
                                 <span class="mx-auto badge bg-info">Customer Notified <i class="bi bi-check-circle"></i></span>
                             </div>
                         @endif

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
                            <div class=" col-4">
                                <a href="/admin/orders/{{$order->id}}/customerPrint" class="btn btn-success w-100"> Print Receipt </a>
                            </div>

                            <div class=" col-4">
                                <button id="notify"
                                        class="btn btn-info w-100  @if($order->customerNotified())disabled @endif"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        data-customer-phone="{{$order->customer->phone}}">
                                    @if($order->customerNotified())
                                        <i class="bi bi-check-circle"></i> Customer Notified
                                    @else
                                        Notify Customer
                                    @endif
                                </button>
                            </div>

                            <div class="  col-4">
                                <a href="/admin/orders/{{$order->id}}/cancel" class="btn btn-danger w-100"> Cancel Order </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Notify customer </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="notificationForm" action="{{route('admin.orders.notify', ['order_id'=>$order->id])}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="telephone" class="form-label">Telephone</label>
                                        <input type="text" name="telephone" class="form-control" id="telephone" >
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Example textarea</label>
                                        <textarea class="form-control" rows="5"  name="message"  wrap="soft">
                                Hi , your order is on its way.
                                The ETA is 10 min.
                                Thank you for your patience.
                            </textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="sendNotificationButton" class="btn btn-success">Send Notification</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @if(session('success'))
                    <div class="w-100">
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                    </div>
            @endif
            @if($errors->any())
                <div class="w-100">
                    <div class="alert alert-danger" role="alert">
                       {{$errors->first()}}
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection
@push('head')
    <script>

       let notifyButton = document.getElementById('notify');
       if(notifyButton){
           notifyButton.addEventListener('click', function (){
               document.getElementById('telephone').value = this.dataset.customerPhone
           })
       }

        let deleteOrderButton = document.getElementById('deleteOrderButton');
       if(deleteOrderButton){
           deleteOrderButton.addEventListener('click', function (event){
                   event.preventDefault();
                   let result = window.confirm('Are you sure ? ( This action cannot be undone )');
                   if(result){
                       document.querySelector('.deleteOrder').submit()
                   }
               })
       }

       let sendNotificationButton = document.getElementById('sendNotificationButton');
       if(sendNotificationButton){
           sendNotificationButton.addEventListener('click', function(){
               document.getElementById('notificationForm').submit()
           })
       }

    </script>
@endpush
