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
            <hr>
            </p>

            @if($item->recipe)
                <div class="accordion" id="x{{$item->id}}" >
                    <div class="accordion-item" style="border:none;">
                        <h2 class="accordion-header" id="headingOne">
                            <button class=" btn view-recipe-button" type="button" data-bs-toggle="collapse" data-bs-target="#xx{{$item->id}}" aria-expanded="true" aria-controls="collapseOne">
                                <span class="view-recipe-button-text">View Recipe</span>
                            </button>
                        </h2>
                        <div id="xx{{$item->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#x{{$item->id}}">
                            <div class="accordion-body">
                                  @foreach($item->recipe as $ingredient)
                                    <span class="text-capitalize">{{$ingredient}}</span>,
                                  @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <add-to-cart-component :itemnumber={{$item->id}} :price={{$item->price}}></add-to-cart-component>
        </div>
    </div>
</div>
