<div>
    <div class="card shadow" >
        <img src="{{$photo}}" class="card-img-top" alt="{{$n}}" >
        <div class="card-body">
            <div class="row mb-2 pl-2">
                <div class="stars col-6" style="color:#ff7700">
                    @for($i = 0; $i < $rated; $i++)
                        <i class="bi bi-star-fill"></i>
                    @endfor
                </div>
                <div class="col-5 d-flex justify-content-end" >
                    <span class="item-card-price" style="text-align: right">£{{$price}}</span>
                </div>
            </div>
            <h4 class="card-title pl-2">{{$n}}</h4>
            <p class="card-text py-2" style="font-weight: lighter">
               {{$description}}
            </p>
            <a class="btn  view-recipe-button">
                <span class="view-recipe-button-text">View Recipe</span>
            </a>
            <add-to-cart-component :itemnumber={{$itemId}} :price={{$price}}></add-to-cart-component>
        </div>
    </div>
</div>
