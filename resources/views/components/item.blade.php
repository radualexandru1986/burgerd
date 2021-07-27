<div class="{{$item->class}}" >
    <div class="card shadow" >
        <img src="{{$item->photo}}" class="card-img-top" alt="{{$item->name}}" >
        <div class="card-body">
            <div class="row mb-2 pl-2">
                <div class="stars col-6" style="color:#ff7700">
                    @for($i = 0; $i < $item->rated; $i++)
                        <i class="bi bi-star-fill"></i>
                    @endfor
                </div>
                <div class="col-5 d-flex justify-content-end" >
                    <span class="item-card-price" style="text-align: right">£{{$item->price}}</span>
                </div>
            </div>
            <h4 class="card-title pl-2">{{$item->name}}</h4>
            <p class="card-text py-2" style="font-weight: lighter">
               {{$item->description}}
            </p>
            <a class="btn  view-recipe-button">
                <span class="view-recipe-button-text">View Recipe</span>
            </a>
            <add-to-cart-component :itemnumber={{$item->id}} :price={{$item->price}}></add-to-cart-component>
        </div>
    </div>
</div>
