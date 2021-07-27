@include('shared.divider')

<div class="menu-items-container" >
    <div class="row mt-4 justify-content-left">
        @foreach($items as $item)
            <div class="col-xxl-4 col-md-6 col-sm-10 mx-sm-auto my-3">
                @include('components.item')
            </div>
        @endforeach
    </div>
</div>

