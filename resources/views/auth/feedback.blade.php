@extends('auth.app')
@section('content')
    <div class="accordion" id="accordionExample">
        @foreach($messges as $message)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading-{{$message->id}}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$message->id}}" aria-expanded="true" aria-controls="collapse-{{$message->id}}">
                        <div class="row w-100">
                            <div class="col-4">
                                <strong>#{{$message->id}}</strong>
                            </div>
                            <div class="col-4">
                                <span class="mx-auto badge bg-warning">{{$message->email}}</span>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="collapse-{{$message->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row my-3">
                            <h4><i class="bi bi-telephone-fill"></i> : {{$message->name}}</h4>
                            <h4><i class="bi bi-geo-alt"></i> : {{$message->email}}</h4>
                            <p>{{$message->message}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
