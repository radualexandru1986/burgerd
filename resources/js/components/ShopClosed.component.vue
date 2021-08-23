<template>
  <div></div>
</template>

<script>
import ls, {get,set} from "local-storage";
export default {

  mounted() {
    if(!this.$store.state.shopState){
      this.$toast.error("We are closed today. Try from Thursday to Saturday  4pm ->11pm", {
        position: "top-left",
        timeout: 10000,
        closeOnClick: true,
        pauseOnFocusLoss: true,
        pauseOnHover: true,
        draggable: true,
        draggablePercent: 0.6,
        showCloseButtonOnHover: false,
        hideProgressBar: true,
        closeButton: "button",
        icon: true,
        rtl: false
      });
      ls.remove('components')
    }
  }
}

</script>

<style scoped>

</style>
