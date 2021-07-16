import ls, {get,set} from "local-storage";
export const  burgerstore ={
    state: {
        orderItems :[]  //[{id:1234, quantity : 2}]
    },
    mutations: {
        increment (state) {
            state.orderTotal++
        },
        addItemsToOrder(state, payload) {
            //Search for the item id in the order
            let item = state.orderItems.filter(el=>el.id===payload.id)
            console.log(item.length)
            //if the product has been added before we will just change the quantity
            if(item.length>0) {
                let i = state.orderItems.indexOf(item[0]);
                state.orderItems[i].quantity = state.orderItems[i].quantity + payload.quantity
            }else{
                //if is the first time they add the product then we will push it to the list
                state.orderItems.push(payload)
            }
            ls.set('orderItems', state.orderItems);
        },

        resurrectOrders(state, payload) {
            state.orderItems = payload
        }
    }
}
