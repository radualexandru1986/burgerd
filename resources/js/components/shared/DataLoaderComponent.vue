<template>

</template>

<script>
import ls, {get,set} from "local-storage";
export default {
  props:['data'],


  beforeMount(){
    ls.set('items', this.data)
    this.$store.commit('bringDataToStore', this.data)

  }
}
</script>
