<template>
  <div class="accordion-item">
    <h2 class="accordion-header" :id="`heading${id}`">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" :data-bs-target="`#id${id}`" aria-expanded="true" :aria-controls="id">
        <img :src="assets.url" class="img-fluid rounded-start" alt="..." style="max-width:30px"> {{assets.itemName}}
      </button>
    </h2>
    <div :id="`id${id}`" class="accordion-collapse collapse" :aria-labelledby="`heading${id}`" data-bs-parent="#menu-card-example">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>

<!--  <div class="col-12 col-xl-6">-->
<!--    <div class="card p-0 mb-3 mx-auto" >-->
<!--      <div class="row  g-0">-->
<!--        <div class="col-4 ">-->
<!--          <img :src="assets.url" class="img-fluid rounded-start" alt="...">-->
<!--        </div>-->
<!--        <div class="col-8">-->
<!--          <div class="card-body text-center">-->
<!--            <h5 class="card-title">{{assets.itemName}}</h5>-->
<!--            <h3> x {{quantity}}</h3>-->
<!--            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->

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
