<template>

</template>

<script>
export default {
  props:['data'],


  beforeMount(){
    this.$store.commit('bringDataToStore', this.data)
  }
}
</script>
