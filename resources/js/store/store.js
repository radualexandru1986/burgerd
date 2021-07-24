import ls, {get,set} from "local-storage";
export const  burgerstore ={
    state: {
        assets: {
            images : [
                {
                    id : '1',
                    url: 'images/menu/TheTurk.png',
                    itemName : 'The Turk'
                },
                {
                    id : '2',
                    url: 'images/menu/DoubleAnimal.png',
                    itemName: 'Double Animal'
                },
                {
                    id : '3',
                    url: 'images/menu/VeganPrime.png',
                    itemName: 'Vegan Prime'

                },
                {
                    id : '4',
                    url: 'images/menu/JuicyLucy.png',
                    itemName: 'Juicy Lucy'
                },
                {
                    id : '5',
                    url: 'images/menu/HotDog.png',
                    itemName: 'Hot Dog'
                },
                {
                    id : '6',
                    url: 'images/menu/salad.jpg',
                    itemName: 'Chicken Salad'
                },
            ]
        },
        mobileMenu: {
            closed: true
        },
        toast: {
            closed: true
        },
        orderItems: []  //[{id:1234, quantity : 2}]
    },
    mutations: {
        increment (state) {
            state.orderTotal++
        },
        addItemsToOrder(state, payload) {
            //Search for the item id in the order
            let item = state.orderItems.filter(el=>el.id===payload.id)
            //if the product has been added before we will just change the quantity
            if(item.length>0) {
                let i = state.orderItems.indexOf(item[0]);
                state.orderItems[i].quantity =  payload.quantity
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
