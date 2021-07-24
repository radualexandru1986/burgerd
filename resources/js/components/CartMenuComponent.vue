<template>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" v-show="!orderItems.length > 0">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title display-4 text-center w-100" >Ups!!</h5>

        </div>
        <div class="modal-body">
          <h3 class="text-center">Your cart is empty!</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark w-100 btn-lg" data-bs-dismiss="modal">Dismiss</button>
        </div>
      </div>
    </div>

    <div class="modal-dialog modal-xl" v-show="orderItems.length > 0" >
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title display-4 text-center w-100" id="exampleModalLabel">Checkout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="accordion" id="menu-card-example">
              <div class="row">
                <div class="col-12 col-xl-7">
                  <menu-card v-for="(item, key) in orderItems"
                             v-bind:key="key"
                             v-bind:id="item.id"
                             v-bind:quantity="item.quantity"
                             v-bind:price="item.perItem"
                             v-bind:button-label="'Update Order'"
                  />
                </div>
                <div class=" col-12 col-xl-5" style="position:relative" >
                  <div >
                    <div class="summary-title">
                      <h1 class="p-0" style="text-align: right">Order summary </h1>
                    </div>
                    <div class="summary-content">
                      <table class="table">
                        <tbody>
                        <tr v-for="(item, key) in orderItems">
                          <td>{{ getName(item.id) }}</td>
                          <td>x {{item.quantity}}</td>
                          <td>£ {{ (item.perItem * item.quantity).toFixed(2)}}</td>
                        </tr>
                        </tbody>
                      </table>
                      <h3 class="py-3 w-100" style="text-align:right">Total  £ {{getTotal()}}</h3>
                    </div>
                    <br>
                    <div class="summary-footer" >
                      <button class="btn btn-dark w-100 btn-lg my-1">Go to checkout!</button>
                      <button class="btn btn-light border-1 border-danger w-100 btn-lg my-1" @click="resetOrder()">Reset Order</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import MenuCard from "./shared/MenuCard.vue";
import ls, {get, set} from 'local-storage'
export default {
  components :{
    'menu-card' : MenuCard
  },
  data(){
    return {

    }
  },
  methods :{
    resetOrder(){
      ls.remove('orderItems')
      this.$store.commit('resetOrder')
    },

    getName(id) {
      let images = this.$store.state.assets.images;
      return images.filter(el=>el.id==id)[0].itemName
    },
    getTotal(){
      if(this.orderItems.length > 0){
        return this.orderItems
            .map(item=>Number(item.perItem)*Number(item.quantity))
            .reduce((prev, curr) => prev + curr, 0).toFixed(2)
      }else{
        return 0
      }
    },
  },
  computed : {
    orderItems(){
      return this.$store.state.orderItems
    },
  }
}

</script>

<style scoped>
.modal{
  font-family: 'Montserrat', sans-serif;
}

button{
  font-family: 'Roboto', sans-serif;
}
</style>
