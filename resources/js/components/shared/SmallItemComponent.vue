<template>
  <div class="row mt-2">
    <div class="col-lg-6 col-12 text-center">
      <div class="column-description pb-2">
       Pick a drink...
      </div>

      <button class="btn btn-lg   small-item-button mb-1 d-flex mx-auto">
        <div class="col-3">
          <img src="images/menu/CocaCola.jpg" alt="" width="35">
        </div>
        <div class="col-8">
          Coca Cola
        </div>
      </button>
      <button class="btn btn-lg   small-item-button mb-1 d-flex mx-auto">
        <div class="col-3">
          <img src="images/menu/CocaColaDiet.jpg" alt="" width="35">
        </div>
        <div class="col-8">
          Diet Coke
        </div>
      </button>
      <button class="btn btn-lg   small-item-button mb-1 d-flex mx-auto">
        <div class="col-3">
          <img src="images/menu/Fanta.jpg" alt="" width="35">
        </div>
        <div class="col-8">
          Fanta
        </div>
      </button>
      <button class="btn btn-lg   small-item-button mb-1 d-flex mx-auto">
        <div class="col-3">
          <img src="images/menu/Sprite.jpg" alt="" width="35">
        </div>
        <div class="col-8 ">
          Sprite
        </div>
      </button>

    </div>
    <div class="col-lg-6 col-12 text-center mt-lg-0 mt-3">
      <div class="column-description pb-2">
       Pick a side...
      </div>

      <button class="btn btn-lg   small-item-button mb-1 d-flex mx-auto">
        <div class="col-3">
          <img class="rounded-circle" src="images/menu/MozzarellaSticks.jpg" alt="" width="50">
        </div>
        <div class="col-9">
          Mozzarella Sticks
        </div>
      </button>
      <button class="btn btn-lg   small-item-button mb-1 d-flex mx-auto">
        <div class="col-3">
          <img class="rounded-circle" src="images/menu/OnionRings.jpg" alt="" width="50">
        </div>
        <div class="col-9">
          Onion Rings
        </div>
      </button>
      <button class="btn btn-lg   small-item-button mb-1 d-flex mx-auto">
        <div class="col-3">
          <img class="rounded-circle" src="images/menu/cheeseBits.jpg" alt="" width="50">
        </div>
        <div class="col-9">
          Cheese Bits
        </div>
      </button>

    </div>
  </div>
</template>
<script>
export default {

}
</script>

<style scoped>

.small-item-button{
  font-family: Roboto Light, sans-serif;
  width:98%;
  border:1px solid #dfdfdf;
  color:black;
  background-color: white;
}
.small-item-button:hover{
  border-color: #ff3d00;
}

.column-description{
  font-size:18px;
}

</style>
