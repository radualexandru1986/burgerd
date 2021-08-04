<template>
  <div class="row mt-2">
    <div class="column-description pb-3 w-100 text-center">
      Pick a drink...
    </div>
    <div class="row mx-auto">
      <div class="col-lg-6 col-12 text-center" v-for="beverage in beverages" :key="beverage.id">
        <button class=" small-item-button mb-1 d-flex mx-auto" :class="{'selected-drink':beverage.id == selectedDrink}" @click="selectBeverage(beverage.id)">
          <div class="col-3">
            <img :src="beverage.photo" alt="" width="35">
          </div>
          <div class="col-8">
            {{ beverage.name }}
          </div>
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props : ['itemid'],
  methods : {
    selectBeverage(bevId){
      this.$store.commit('selectBeverage', {id:this.itemid, bevId:bevId})
    }
  },
  computed :{
  beverages(){
    return this.$store.state.items.filter(el=>el.class == 'beverages')
  },
  selectedDrink() {
    return  this.$store.state.orderItems.filter(el=>el.id == this.itemid)[0].drink
  }
}
}
</script>

<style scoped>

.small-item-button{
  font-family: Roboto Light, sans-serif;
  width:100%;
  padding:0.5rem 1rem;
  border:1px solid #dfdfdf;
  color:black;
  border-radius:4px;
  background-color: white;
  transition-duration: 300ms;
}
.small-item-button:hover{
  border-color: #ff3d00;
}

.column-description{
  font-size:18px;
}
.selected-drink {
  border:1px solid green;
}

</style>
