@extends('auth.app')
@section('content')
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh">
        <form class="shadow p-5 col-12 col-lg-4" action="/admin/login" method="post">
            <h1>Admin</h1>
            @csrf
            <div class="form-group mt-5">
                <label>User*</label>
                <input type="email" name="email" class="form-control form-control-lg" autofocus required>
            </div>

            <div class="form-group mt-2">
                <label >Password*</label>
                <input type="password" name="password" class="form-control form-control-lg" required>
            </div>
            <button type="submit" class="btn btn-primary mt-5 btn-lg w-100">Submit</button>
        </form>
    </div>

@endsection
