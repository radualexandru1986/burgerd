require('./bootstrap');

// window.Vue = require('vue').default;
import Vue from 'vue';
import Vuex from 'vuex'
import {burgerstore} from './store/store'
import ls, {get, set} from 'local-storage'
Vue.config.ignoredElements = [
    'x-item']
Vue.use(Vuex)
const store = new Vuex.Store(burgerstore)

Vue.component('add-to-cart-component', require('./components/AddToCartComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store:store,
    components :{

    },
    computed : {
        getTotal(){
            let orderItems = this.$store.state.orderItems;
            if(orderItems.length > 0){
                return orderItems
                    .map(item=>Number(item.perItem)*Number(item.quantity))
                    .reduce((prev, curr) => prev + curr, 0).toFixed(2)
            }else{
                return 0
            }
        },
        getItemsTotal() {
            let orderItems = this.$store.state.orderItems;
            if(orderItems.length > 0){
                return orderItems
                    .map(item=>Number(item.quantity))
                    .reduce((prev, curr) => prev + curr, 0).toFixed(0)
            }else{
                return 0
            }
        }
    },
    beforeMount() {
        if(ls.get('orderItems')){
            this.$store.commit('resurrectOrders', ls.get('orderItems'))
        }
    }
});
