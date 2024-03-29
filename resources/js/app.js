require('./bootstrap');
import Vue from 'vue';
import Vuex from 'vuex'
import {burgerstore} from './store/store'
import {admin} from './admin/store/store';
import ls, {get, set} from 'local-storage'
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

Vue.config.ignoredElements = ['x-item']
Vue.use(Vuex)
Vue.use(Toast)
const store = new Vuex.Store(burgerstore)
const adminStore = new Vuex.Store(admin);
if(document.getElementById('app')){
    Vue.component('add-to-cart-component', require('./components/AddToCartComponent.vue').default);
    Vue.component('mobile-menu-component', require('./components/MobileMenuComponent.vue').default);
    Vue.component('cart-menu-component', require('./components/CartMenuComponent.vue').default);
    Vue.component('toast', require('./components/shared/ToastComponent').default);
    Vue.component('loader', require('./components/shared/LoaderComponent').default);
    Vue.component('data-loader', require('./components/shared/DataLoaderComponent').default);
    Vue.component('checkout-screen', require('./components/shared/CheckoutScreenComponent').default);
    Vue.component('order-success', require('./components/shared/OrderSuccessComponent').default);
    Vue.component('small-item', require('./components/shared/SmallItemComponent').default);
    Vue.component('shop-closed', require('./components/ShopClosed.component').default);
    const app = new Vue({
        el: '#app',
        store:store,
        data : {
            filtered : 'burgers'
        },
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
            if(ls.get('components')){
                this.$store.commit('resurrectComponentsState', ls.get('components'))
            }
        },

    });
}





//admin
if(document.getElementById('admin')){
    const admin = new Vue({
        'el' :'#admin',
        store:adminStore,
        mounted(){
            alert('admin is mounted')
        }
    })
}

