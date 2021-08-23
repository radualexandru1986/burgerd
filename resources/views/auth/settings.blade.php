@extends('auth.app')

@section('content')
    <div class="container-xl">
        <h1 class="display-2">Settings</h1>
        <hr>
        <div class="shopstate">
            @if(\App\Models\Settings::isOpen())
                <p style="font-size: 25px">The shop si now : <span class="badge bg-success">OPEN</span>  </p>
                <a href="{{route('admin.settings.close')}}" class="btn btn-lg btn-warning w-100" id="store-state">Close Shop</a>
            @else
                <p style="font-size: 25px">The shop si now : <span class="badge bg-warning">CLOSED</span>  </p>
                <a href="{{route('admin.settings.open')}}" class="btn btn-lg btn-success w-100" id="store-state">Open Shop</a>
            @endif
        </div>
    </div>
@endsection

