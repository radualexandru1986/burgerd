@extends('auth.app')
@section('content')
    <div class="container">
        <h3 class="display-3"> Create a new product </h3>
        <hr>
        <form class="p-4 shadow" method="POST" action="{{route('admin.products.store')}}"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col">
                <label for="orderIndex" class="form-label">OrderIndex</label>
                <input class="form-control form-control-lg" type="number" id="orderIndex" name="order" >
            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">Photo</label>
                    <input class="form-control form-control-lg" type="file" id="formFile" name="image">
                </div>
                <div class="mb-3 col">
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control form-control-lg" type="text" id="name" name="name">
                </div>

            </div>
            <div class="row">
                <div class="mb-3 col">
                    <label for="class"  class="form-label">Class</label>
                    <select class="form-select form-control-lg"  name="class" id="class">
                        <option value="burgers">Burgers</option>
                        <option value="vegan">Vegan</option>
                        <option value="salad">Salad</option>
                        <option value="sides">Sides</option>
                        <option value="beverages">Beverages</option>
                        <option value="kids">Kids</option>
                    </select>
                </div>

                <div class="mb-3 col">
                    <label for="bundle"  class="form-label">Is Bundle</label>
                    <select class="form-select form-control-lg"  name="bundle" id="bundle">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>


                <div class="mb-3 col">
                    <label for="price" class="form-label">Price</label>
                    <input class="form-control form-control-lg" type="text" id="price" name="price" >
                </div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Recipe</label>
                <input class="form-control " type="text" id="recipe" name="recipe" >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="5" name="description"></textarea>
            </div>
            <input type="submit" class="btn btn-primary btn-lg w-100" value="Save product">

        </form>
    </div>

@endsection
