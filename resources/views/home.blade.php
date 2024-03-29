@extends('layouts.app')
@section('content')
    <div class="container-fluid p-0 m-0 home-page">
        <section class="isHero m-0">
            <div class="darkOverlay">
                <div class="heroText w-100 text-center" >
                        <h1 class="beastText">
                           <span class="x-1"> THE </span><br>
                           <span class="x-2"> BEAST </span><br>
                           <span class="x-3"> BURGERS </span><br>
                            <span class="x-5">IN</span> <span class="x-4">  TOWN </span><br>
                        </h1>
                </div>
                <div class="call-to-action">
                    <a href="#menu_start">
                    <button class="call-to-action-btn" >ORDER NOW</button></a>
                </div>
            </div>
        </section>
        <section class="container-xl">
            @include('layouts.menu-section')
            <data-loader :data="{{json_encode($items)}}" :shopstate="{{$settings->open}}"></data-loader>
        </section>

    </div>

@endsection
