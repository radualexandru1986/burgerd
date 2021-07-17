<template>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cart Contents</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <menu-card v-for="(item, key) in orderItems" v-bind:id="item.id" v-bind:quantity="item.quantity"/>
          </div>
          <button class="btn btn-dark" @click="resetOrder()"> Reset Order</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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
      window.location.reload()
    }
  },
  computed : {
    orderItems(){
      return this.$store.state.orderItems
    }
  }
}

</script>

<style scoped>
.modal{
  font-family: "Nunito", sans-serif;
}
</style>
