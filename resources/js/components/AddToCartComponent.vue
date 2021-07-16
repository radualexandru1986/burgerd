<template>
  <div>
    <div class="row mt-5 mb-2 add-area">
      <div class="col-12  mx-auto">
        <h2 class="w-100 text-center">
          <i class="bi bi-plus-circle-fill add-button mx-2" @click="incrementQuantity()"></i>
          <strong class="font-size-40">{{quantity}}</strong>
          <i class="bi bi-dash-circle-fill mx-2 add-button" @click="decrementQuantity()"></i>
        </h2>
      </div>
    </div>

    <div class="row">
      <div class="col-12 text-center my-2">
        <button class="x-button w-100" @click="addToCart()">
          <span class="mr-5">Add to Cart</span>  <i class="bi bi-cart4 ml-5"></i>
        </button>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name : 'AddToCartComponent',
  props : ['itemnumber', 'price'],
  data(){
    return {
      quantity:1,
    }
  },
  methods : {
    incrementQuantity(){
      this.quantity++
    },
    decrementQuantity(){
      this.quantity > 1 ? this.quantity-- : ''
    },
    addToCart(){
      this.$store.commit('addItemsToOrder', {id:this.itemnumber , quantity: this.quantity, perItem : this.price})
    }
  }

}
</script>

<style scoped>
    .x-button:hover{
      background-color:#ff3d00;
      color:white;
    }
</style>
