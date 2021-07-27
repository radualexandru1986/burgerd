import ls, {get,set} from "local-storage";
export const  burgerstore ={
    state: {
        items: [],
        other : [],
        mobileMenu: {
            closed: true
        },
        checkout:false,
        orderItems: []  //[{id:1234, quantity : 2}]
    },
    mutations: {

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

        resetOrder(state) {
            state.orderItems = []
        },

        toggleMobileMenuState(state) {
            state.mobileMenu.closed = !state.mobileMenu.closed
        },

        removeItemFromOrder(state, payload) {
            state.orderItems = [...state.orderItems.filter(el => el.id !== payload.id)]
            ls.set('orderItems', state.orderItems);
        }
    }
}
