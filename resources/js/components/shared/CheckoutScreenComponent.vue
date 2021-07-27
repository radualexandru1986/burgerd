<template>
  <div class="row checkout-form p-lg-5">
    <div class="col mx-auto ">
      <form class="row g-3 mb-lg-5 mb-2">
        <div class="col-md-8">
          <label for="street" class="form-label">Street *</label>
          <input type="text" class="form-control form-control-lg" id="street" v-model="address.street" :class="{'border-danger' : !isValid('street')}">
        </div>

        <div class="col-md-4">
          <label for="house_number" class="form-label">Number *</label>
          <input type="text" class="form-control form-control-lg " id="house_number" v-model="address.number" :class="{'border-danger' : !isValid('number', 0)}">
        </div>

        <div class="col-12">
          <label for="postcode" class="form-label">Postcode *</label>
          <input type="text" class="form-control form-control-lg " id="postcode" v-model="address.postcode" :class="{'border-danger' : !isValid('postcode')}">
          <span class="text-muted"> We will check the postcode to make sure we can deliver to your address</span>
        </div>

        <div class="col-md-12">
          <label for="mobile" class="form-label">Mobile Phone *</label>
          <input type="text" class="form-control form-control-lg " id="mobile" v-model="address.telephone" :class="{'border-danger' : !isValid('telephone', 10)}">
          <span class="text-muted"> We will send a message to confirm the order</span>
        </div>
      </form>
    </div>
    <div class="col-12">
      <div class="col-12  mx-auto text-center my-1">
        <button class="btn w-100 btn-dark btn-lg"> Verify Order !</button>
      </div>
      <div class="col-12  mx-auto text-center my-1 ">
        <button class="btn w-100  border-1 border-dark btn-lg" @click="backToOrders()"> Back To Orders Screen</button>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  data(){
    return {
      address : {
        street :'',
        number : '',
        postcode : '',
        telephone : ''
      }
    }
  },
  methods:{
    backToOrders(){
      this.$store.commit('backToOrders')
    },
    isValid(field, len=3) {
      return this.address[field].length > len
    },

  },
  computed:{
    isCheckoutOn(){
      return this.$store.state.checkout
    },
  },
  created(){

  }
}
</script>

<style scoped>
.checkout-screen-off {
  position:absolute;
  right:-1000px;
  animation-delay: 500ms;
  visibility: hidden;
}
.checkout-screen-on {
 position:inherit;
  margin:auto;
  animation-delay: 500ms;
  visibility: visible;
}

.checkout-form{
  font-family: Roboto, sans-serif;
  color:black;
}
</style>
