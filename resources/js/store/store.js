import ls, {get,set} from "local-storage";
export const  burgerstore ={
    state: {
        components:{
          checkout:{
              confirmation:{
                  show:'',
                  code : ''
              },
              loading:false,
              formFields:{
                  disabled:false
              },
              formData : {
                  street: '',
                  number : '',
                  postcode: '',
                  phone : ''
              },
              verifyButton : {
                  disabled : false
              }
          }
        },
        items: [],
        other : [],
        mobileMenu: {
            closed: true
        },
        checkout:false,
        orderItems: []  //[{id:1234, quantity : 2}]
    },
    mutations: {
        checkoutNotLoading(state) {
            this.state.components.checkout.loading = false;
        },
        checkoutLoading(state) {
            this.state.components.checkout.loading = true;
        },
        toCheckout(state){
            state.checkout = true;
        },

        backToOrders(state) {
          state.checkout = false;
        },
        bringDataToStore(state, payload) {
            this.state.items = payload
            console.log(this.state.items)
        },
        increment (state) {
            state.orderTotal++
        },
        addItemsToOrder(state, payload) {
            //Search for the item id in the order
            let item = state.orderItems.filter(el=>el.id===payload.id)
            //if the product has been added before we will just change the quantity
            if(item.length>0) {
                let i = state.orderItems.indexOf(item[0]);
                if(payload.isInCart){
                    state.orderItems[i].quantity = payload.quantity
                }else{
                    state.orderItems[i].quantity = Number(state.orderItems[i].quantity) + Number(payload.quantity)
                }

            }else{
                //if is the first time they add the product then we will push it to the list
                state.orderItems.push(payload)
            }
            ls.set('orderItems', state.orderItems);
        },

        resurrectOrders(state, payload) {
            state.orderItems = payload
        },

        resurrectComponentsState(state, payload) {
          state.components = payload
        },

        resetOrder(state) {
            state.orderItems = []
        },

        toggleMobileMenuState(state) {
            state.mobileMenu.closed = !state.mobileMenu.closed
        },

        removeItemFromOrder(state, payload) {
            let items = state.orderItems.filter(el => el.id !== payload.id)
            state.orderItems = [...items]
            ls.set('orderItems', state.orderItems);
        },

        disableCheckoutButton(state) {
            state.components.checkout.verifyButton.disabled = true;
            ls.set('components', state.components);
        },
        enableCheckoutButton(state) {
            state.components.checkout.verifyButton.disabled = false;
            ls.set('components', state.components);
        },

        disableCheckoutForm(state) {
            this.state.components.checkout.formFields.disabled = true;
            ls.set('components', state.components);
        },

        enableCheckoutForm(state) {
            this.state.components.checkout.formFields.disabled = false;
            ls.set('components', state.components);
        },

        saveCheckoutFormData(state, payload){
          this.state.components.checkout.formData = payload
            ls.set('components', state.components);
        },

        saveConfirmationState(state, payload) {
            this.state.components.checkout.confirmation = payload;
            ls.set('components', state.components);
        },

        showConfirmation(state) {
          this.state.components.checkout.confirmation.show = true;
            ls.set('components', state.components);
        },

        hideConfirmation(state) {
          this.state.components.checkout.confirmation.show = false;
            ls.set('components', state.components);
        },

        clearMemory() {
            ls.clear()
        }
    }
}
