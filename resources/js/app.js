require('./bootstrap');
import Vue from 'vue';
import Vuex from 'vuex'
import {burgerstore} from './store/store'
import ls, {get, set} from 'local-storage'

Vue.config.ignoredElements = ['x-item']
Vue.use(Vuex)
const store = new Vuex.Store(burgerstore)

Vue.component('add-to-cart-component', require('./components/AddToCartComponent.vue').default);
Vue.component('mobile-menu-component', require('./components/MobileMenuComponent.vue').default);
Vue.component('cart-menu-component', require('./components/CartMenuComponent.vue').default);
Vue.component('toast', require('./components/shared/ToastComponent').default);

const app = new Vue({
    el: '#app',
    store:store,
    components :{

    },
    methods:{
        toggleMobileMenuState(){
            this.$store.commit('toggleMobileMenuState')
        }
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


