@include('shared.divider')

<div class="menu-items-container" >
    <div class="row mt-4 justify-content-left">

        <div class="col-xxl-4 col-md-6 col-sm-10 mx-sm-auto my-3">
            <x-item
                    :photo="'images/menu/TheTurk.png'"
                    :n="'The Turk'"
                    :price="'9.20'"
                    :rated="'3'"
                    :description="' Rich and creemy burger with egg , bacon & a juicy 100% beef burger'"
                    :itemId="1"
            />
        </div>
        <div class="col-xxl-4 col-md-6 col-sm-10 mx-sm-auto my-3">
            <x-item
                    :photo="'images/menu/DoubleAnimal.png'"
                    :n="'Double Animal'"
                    :price="'9.20'"
                    :rated="'5'"
                    :description="' A huge double burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise!'"
                    :itemId="2"
            />
        </div>
        <div class="col-xxl-4 col-md-6 col-sm-10 mx-sm-auto my-3">
            <x-item
                    :photo="'images/menu/VeganPrime.png'"
                    :n="'Vegan Prime'"
                    :price="'8.00'"
                    :rated="'2'"
                    :description="' A huge single or triple burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise!'"
                    :itemId="3"
            />
        </div>
        <div class="col-xxl-4 col-md-6 col-sm-10 mx-sm-auto my-3">
            <x-item
                    :photo="'images/menu/JuicyLucy.png'"
                    :n="'Juicy Lucy'"
                    :price="'7.50'"
                    :rated="'5'"
                    :description="' A huge single or triple burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise!'"
                    :itemId="4"
            />
        </div>
        <div class="col-xxl-4 col-md-6 col-sm-10 mx-sm-auto my-3">
            <x-item
                    :photo="'images/menu/HotDog.png'"
                    :n="'Hot Dog'"
                    :price="'7.50'"
                    :rated="'5'"
                    :description="' A huge single or triple burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise!'"
                    :itemId="5"
            />
        </div>
        <div class="col-xxl-4 col-md-6 col-sm-10 mx-sm-auto my-3">
            <x-item
                    :photo="'images/menu/salad.jpg'"
                    :n="'Chicken Salad'"
                    :price="'7.50'"
                    :rated="'5'"
                    :description="' A huge single or triple burger with all the fixings, cheese, lettuce, tomato, onions and special sauce or mayonnaise!'"
                    :itemId="6"
            />
        </div>

    </div>
</div>

