@extends('layouts.app')
@section('content')
    <div class="container-fluid has-custom-bg py-5">
        <div class="container-xxl d-flex justify-content-center align-items-center bg-light has-form" style="min-height: 75vh;">
            <div class="col-10 mx-auto py-5">
                <div class="row ">
                    <div class="col-12 col-xl-5 mx-auto mb-5 mb-md-1">
                        <h1 class="display-4">Fill the form</h1>
                        <h1>It's easy..</h1>
                        <form class="row g-3 mt-5 ">
                            <div class="col-12">
                                <label for="inputZip" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>

                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>

                            <div class="col-12">
                                <label for="textarea" class="form-label w-100">Your message</label>
                                <textarea class="form-control w-100"  cols="10" rows="4" id="textarea"></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="special-button btn-grad">Send Message</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-xl-6 right-column" >
                        <h1 class="display-4">or you can use </h1>
                        <h1>..other ways</h1>
                        <div class="block-container mt-4">
                            <div class="channel ">
                                <img src="{{asset('images/contactpage/icons8-facebook-480@2x.png')}}" alt="">
                            </div>
                            <div class="channel ">
                                <img src="{{asset('images/contactpage/icons8-facebook-messenger-480@2x.png')}}" alt="">
                            </div>
                            <div class="channel ">
                                <img src="{{asset('images/contactpage/icons8-whatsapp-512@2x.png')}}" alt="">
                            </div>
                            <div class="channel ">
                                <img src="{{asset('images/contactpage/telephone@2x.png')}}" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

