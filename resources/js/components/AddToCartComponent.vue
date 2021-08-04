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
          <div v-if="!loading">
            <span class="mr-5">{{ buttonLabel }}</span>  <i class="bi bi-cart4 ml-5"></i>
          </div>
          <span v-if="loading"><loader></loader></span>

        </button>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name : 'AddToCartComponent',
  props : {
    itemnumber: Number,
    price: Number,
    buttonLabel: {
      default: 'Add To Cart',
      type : String
    },
    addQuantity : {
      default : 1,
      type : Number
    },
    isInCart : {
      default:false,
      type : Boolean
    }
  },
  data(){
    return {
      quantity:'',
      loading:false,
    }
  },
  methods : {
    incrementQuantity(){
      this.quantity++
    },
    decrementQuantity(){
      this.quantity > 1 ? this.quantity-- : ''
    },

    getQuantity(){
      let order = this.$store.state.orderItems.filter(el=>el.id == this.itemnumber)[0]
      if(order && order.quantity > 0) {
        this.quantity = order.quantity
      }else{
        this.quantity = 1
      }
    },

    addToCart(){
      this.$store.commit('addItemsToOrder', {
        id:this.itemnumber ,
        quantity: this.quantity,
        perItem : this.price,
        isInCart:this.isInCart,
        ...this.defaultBeverage
      })
      this.$toast.success("Item Added", {
        position:'bottom-center',
        timeout:2000,
      });
    },
  },
  computed: {
    defaultBeverage(){
      let items = this.$store.state.items;
      let isMenu = items.filter(el=>{
        return el.id==this.itemnumber && (el.class == 'beverages' || el.class == 'sides')
      }).length < 1
      console.log(isMenu)
      if(isMenu){
        let beverage = items.filter(el=>el.class == 'beverages')[1]
        return {drink : beverage.id};
      }
    }
  },
  mounted() {
    this.quantity = this.addQuantity
  }

}
</script>

<style scoped>
  .x-button{
    font-family: 'Lato', sans-serif;
    background-color:#FFAA00;
    border-radius:5px;
    border:none;
    color:black;
    font-size:18px;
    font-weight: 600;
    padding:.7rem .5rem ;
  }
  .x-button:hover{
    background-color:#ff3d00;
    color:white;
  }
  .add-area {
    font-family: 'Lato', sans-serif;
  }
  .add-area .add-button{
    cursor: pointer;
    color:#ff3d00;
    font-size:40px;
  }
  .add-area .font-size-40 {
    font-size:40px;
  }



</style>
