<template>
  <div class="col-12  menu-card">
    <div class="accordion-item">
      <h2 class="accordion-header" :id="`heading${id}`">
        <button class="accordion-button" data-bs-toggle="collapse" :data-bs-target="`#id${id}`" aria-expanded="true" :aria-controls="id">
          <section class="row w-100">
            <div class="col-4 col-sm-4 p-0" >
              <img :src="assets.url" class="img-fluid rounded" alt="...">
            </div>
            <div class="col-8 col-sm-8" style="position: relative;">
              <div class="item-card-title text-left" >
               <span class="big-title d-lg-flex justify-content-between">{{assets.itemName}} <strong>x {{quantity}}</strong> £ {{price}}</span>
              </div>
              <div class="item-card-body px-1 py-4 d-flex flex-column flex-lg-row" >
                <span class="item">
                  Diet Coke
                </span>
                <span class="item">
                  Mozarella Sticks
                </span>
              </div>
            </div>
          </section>
        </button>
      </h2>
      <div :id="`id${id}`" class="accordion-collapse collapse" :aria-labelledby="`heading${id}`" data-bs-parent="#menu-card-example">
        <div class="accordion-body">
          This is the accordion body
          <add-to-cart-component :itemnumber="id" :price="price" :buttonLabel="buttonLabel"></add-to-cart-component>
          <button class="btn border-1 border-danger delete-item w-100"  @click="removeItem()">
            <i class="bi bi-trash"></i> Remove Item
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name : 'MenuCard',
  props : {
    id : Number,
    quantity : Number,
    price : Number,
    buttonLabel : {
      default : 'Add To Order',
      type : String
    }
  },

  data(){
    return {
      loading:false,
    }
  },

  methods :{
    removeItem(){
      this.$store.commit('removeItemFromOrder', {id:this.id})
      this.$toast.success("Item removed", {
        position:'bottom-center',
        timeout:2000,
      });
    }
  },
  computed:{
    assets(){
      let images = this.$store.state.assets.images;
      return images.filter(el=>el.id==this.id)[0]
    }
  }
}
</script>

<style>
.accordion-button img{
  max-width:200px;
  margin:0!important;
}
@media only screen and (max-width: 576px){
  .accordion-button img{
    max-width:80%;
  }
}
.accordion-button:not(.collapsed) {
  color:unset;
  background-color:unset;
  box-shadow:unset;
}

.item-card-title {

}

.item-card-title .big-title{
  font-size: 20px;
  font-weight: bold;
}

.menu-card {
  font-family: 'Montserrat', sans-serif;
}

.item{
  padding:6px;
  background-color:#ff5700;
  border-radius:26px;
  font-family: Roboto, sans-serif;
  font-size:15px;
  color:white;
  margin:2px;
  text-align: center;
}

.delete-item{
  font-family: Roboto, sans-serif;
}
.delete-item:hover{
  color:white;
  background-color:#ff3d00;
}


.item-card-footer{
  position:absolute;
  bottom:1px;
  right:1px;
}
@media only screen and (max-width: 576px) {
  .item-card-title .big-title{
    font-size:14px;
    font-weight: lighter;
  }
  .item-card-body {
    font-weight: lighter;
    font-size:12px;
  }
.accordion-button{
  background-color:white;
}
  .item-card-footer{
      position:relative;
      text-align:right;
   }
}

</style>
