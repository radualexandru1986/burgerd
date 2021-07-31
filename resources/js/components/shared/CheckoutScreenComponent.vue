<template>
  <div class="row checkout-form p-lg-5">
    <div class="col mx-auto ">
      <form class="row g-3 mb-lg-5 mb-2">
        <div class="col-md-4" v-show="!formDisabled">
          <label for="house_number" class="form-label">House Nr. *</label>
          <input type="text" class="form-control form-control-lg" id="house_number" v-model="address.number"
                 :class="{'border-success' : isValid('number', 1, 11), 'border-danger':!isValid('number', 1, 11)}"  :disabled="formDisabled">
        </div>

        <div class="col-md-8" v-show="!formDisabled">
          <label for="street" class="form-label">Street *</label>
          <input type="text" class="form-control form-control-lg" id="street" v-model="address.street"
                 :class="{'border-success' : isValid('street', 3, 50), 'border-danger':!isValid('street', 3, 50)}" :disabled="formDisabled">
        </div>

        <div class="col-12" v-show="!formDisabled">
          <label for="postcode" class="form-label">Postcode *</label>
          <input type="text" class="form-control form-control-lg " id="postcode" v-model="address.postcode"
                 :class="{'border-success' : isValid('postcode', 6, 6), 'border-danger':!isValid('postcode', 6, 6)}" :disabled="formDisabled">
          <span class="text-muted"> We will check the postcode to make sure we can deliver to your address</span>
        </div>

        <div class="col-md-12" v-show="!formDisabled">
          <label for="mobile" class="form-label">Mobile Phone *</label>
          <input type="number" class="form-control form-control-lg " id="mobile" v-model="address.phone"
                 :class="{'border-success' : isValid('phone', 10, 11), 'border-danger':!isValid('phone', 10, 11)}" :disabled="formDisabled">
          <span class="text-muted"> We will send a message to confirm the order</span>
        </div>
      </form>
      <div class="col-md-12" v-show="confirmation.show">
        <label for="mobile" class="form-label"><strong>Confirmation</strong></label>
        <input type="text" class="form-control form-control-lg p-3 text-center" id="confirmation" v-model="confirmation.code">
        <span class="text-muted">Please insert the code you received via SMS </span>
        <button class="btn w-100 btn-dark btn-lg cxc p-3" @click="sendConfirmation()"> Send Code </button>
        <button class="btn w-100 border-danger btn-lg mt-2" @click="resetOrder()"> Reset Order </button>
      </div>
    </div>
    <div class="col-12" v-show="!buttonState.disabled">
      <div class="col-12  mx-auto text-center my-1">
        <button class="btn w-100 btn-dark btn-lg cxc" :disabled="buttonState.disabled" @click="sendOrder()"> Verify Order !
          <div class="spinner-border text-light" role="status" v-if="loading">
            <span class="visually-hidden">Loading...</span>
          </div>
        </button>
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
      confirmation:{
        show:false,
        code :''
      },
      address : {
        street :'',
        number : '',
        postcode : '',
        phone : ''
      }
    }
  },
  methods:{
    resetOrder(){
      this.$store.commit('clearMemory');
      window.location.reload()
    },
    backToOrders(){
      this.$store.commit('showScreen', {actual:'checkoutScreen', next:'orderScreen'})
    },
    isValid(field, min, max) {
      let elLength = this.address[field].trim().length;
      return elLength >= min && elLength <= max
    },

    sendConfirmation(){
      axios.post('/orders/confirm', { verification:this.confirmation.code })
      .then(response=>{
          this.$store.commit('showScreen', {actual:'checkoutScreen', next:'successScreen'})
        })
      .catch(error=>{
        alert(error.response.data.message);
      })
    },

    sendOrder() {
      //we will disable check button until another event occurs..
      this.$store.commit('disableCheckoutButton')
      this.$store.commit('checkoutLoading');
      //sending the data to the backend
      axios.post('/orders/create', this.address)
          .then(response=>{
            this.$store.commit('checkoutNotLoading');
              //disable checkout form
            this.$store.commit('disableCheckoutForm')

            //save the form data into the store
            this.$store.commit('saveCheckoutFormData', this.address)

             //show the confirmation field
            this.confirmation.show=true;
            this.$store.commit('saveConfirmationState', this.confirmation)
            })
          .catch((error)=>{

              if(error.response.status===500){
                alert('We don`t deliver to this postcode');
              }
              if(error.response.status===422) {
                alert('Something is not right. Make sure you filled all the details')
              }
              this.$store.commit('checkoutNotLoading')
              this.$store.commit('enableCheckoutButton')
            });
    },

  },
  computed:{
    isCheckoutOn(){
      return this.$store.state.checkout
    },
    loading(){
      return this.$store.state.components.checkout.loading;
    },
    buttonState(){
      return this.$store.state.components.checkout.verifyButton;
    },
   formDisabled() {
      return this.$store.state.components.checkout.formFields.disabled;
   },

  },
  mounted() {
    this.address = this.$store.state.components.checkout.formData
    this.confirmation = this.$store.state.components.checkout.confirmation
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

.cxc:hover{
  background-color:#ff3d00;
}

#confirmation{
  border:3px solid black;
  font-size:40px;

}
</style>
