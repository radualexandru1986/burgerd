<template>
  <div>
    <div class="row">
      <div class="col" style="text-align: center;margin: 0;padding: 0 0 10px 0;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-check-circle" style="font-size: 74px;text-align: center;margin: auto;background: #ffffff;color: var(--bs-teal);width: 96px;">
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"></path>
      </svg>
        <h1 style="color: rgb(40,40,41);text-align: center;font-size: 54px;font-family: Roboto, sans-serif;">Success</h1>
        <p style="color: rgb(0,0,0);font-size: 15px;text-align: center;font-family: Roboto, sans-serif;">Your order will be processed shortly !</p>
      </div>
    </div>
    <div class="row">
      <button class="btn btn-dark w-100 btn-lg"  data-bs-dismiss="modal" @click="reset()">
        Close
      </button>
    </div>
  </div>
</template>

<script>
export default {
methods:{
  reset(){
    this.$store.commit('resetOrder')
    this.$store.commit('resetComponents')
    this.$store.commit('clearMemory')
    window.location.reload()
  }
}
}
</script>
