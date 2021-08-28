@extends('auth.app')
@section('content')
    <div class="container-xl">
        <h1 class="display-3">Products area </h1>
        <hr>
        <div class="row mb-3">
            <div class="col">
                <h3>Products</h3>
            </div>
            <div class="col">
                <a href="{{route('admin.products.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add new product</a>
            </div>
        </div>
        <div class="accordion" id="accordionExample">
            @foreach($items as $item)
                <div class="accordion-item">
                <h2 class="accordion-header" id="heading-{{$item->id}}">
                    <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$item->id}}" aria-expanded="true" aria-controls="collapseOne">
                     <div class="row w-100">
                         <div class="col-4">
                             <img src="{{ $item->photo}}" alt="" width="100" class="rounded-circle">
                         </div>
                         <div class="col-3">{{$item->name}}</div>
                         <div class="col-3">{{$item->order}}</div>
                     </div>
                    </div>
                </h2>
                <div id="collapse-{{$item->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <button class="float-end btn btn-danger"><i class="bi bi-trash"></i> Delete Product</button>

                        <form class="p-4 shadow" method="POST" action="{{route('admin.products.update', ['product'=>$item->id])}}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h3>Edit the product details</h3>
                            <hr>
                            <div class="mb-3 col">
                                <label for="orderIndex" class="form-label">OrderIndex</label>
                                <input class="form-control form-control-lg" type="number" id="orderIndex" name="order" value="{{$item->order}}">
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="formFile" class="form-label">Photo</label>
                                    <input class="form-control form-control-lg" type="file" id="formFile" name="image">
                                </div>
                                <div class="mb-3 col">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control form-control-lg" type="text" id="name" name="name" value="{{$item->name}}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="class"  class="form-label">Class</label>
                                    <select class="form-select form-control-lg"  name="class" id="class">
                                        <option selected>{{ucfirst($item->class)}}</option>
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
                                        <option value="yes" @if($item->isBundle()) selected @endif>Yes</option>
                                    </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="price" class="form-label">Price</label>
                                    <input class="form-control form-control-lg" type="text" id="price" name="price" value="{{$item->price}}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="recipe" class="form-label">Recipe</label>
                                <input class="form-control " type="text" id="recipe" name="recipe" value="{{$item->recipe}}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" rows="5" name="description">
                                    {{$item->description}}
                                </textarea>
                            </div>
                            <input type="submit" class="btn btn-primary btn-lg w-100" value="Apply Changes">

                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
