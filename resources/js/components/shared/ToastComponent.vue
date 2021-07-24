<template>
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast"  v-bind:class="{'hide-toast' : toastIsClosed}" role="alert" aria-live="assertive" aria-atomic="true">
    <h1>toast plm </h1>
    </div>
  </div>
</template>

<script>
export default {
  computed :{
    toastIsClosed(){
      return this.$store.state.toast.closed;
    }
  },
  mounted(){
    console.log('mounted -toast')
  }
}

</script>

<style scoped>
.hide-toast{}


</style>
