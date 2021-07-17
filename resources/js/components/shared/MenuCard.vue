<template>
  <div class="col-12 col-xl-6">
    <div class="card p-0 mb-3 mx-auto" >
      <div class="row  g-0">
        <div class="col-4 ">
          <img :src="assets.url" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-8">
          <div class="card-body text-center">
            <h5 class="card-title">{{assets.itemName}}</h5>
            <h3> x {{quantity}}</h3>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  name : 'MenuCard',
  props : ['id', 'quantity'],
  computed:{
    assets(){
      let images = this.$store.state.assets.images;
      return images.filter(el=>el.id==this.id)[0]
    }
  }
}
</script>

<style>

</style>
