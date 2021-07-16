<template>
  <div class="side-container" v-bind:class="{closed:isClosed, open:!isClosed}">
    <div class="close-button text-center text-light" style="font-size: 50px;" @click="toggleState()">
      <i class="bi bi-x-square"></i>
      <div class="mobileMenuButtonsContainer">
        <button class="btn btn-dark w-100 py-4 border-1 border-warning" onclick="window.location.href='/'">Home</button>
        <button class="btn btn-dark w-100 py-4 border-1 border-warning" onclick="window.location.href='/order'">Order</button>
        <button class="btn btn-dark w-100 py-4 border-1 border-warning" onclick="window.location.href='/faq'" >F.A.Q</button>
        <button class="btn btn-dark w-100 py-4 border-1 border-warning" onclick="window.location.href='/contact'">Contact</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  computed : {
    isClosed(){
      return this.$store.state.mobileMenu.closed;
    }
  },
  methods : {
    toggleState(){
      this.$store.commit('toggleMobileMenuState')
    }
  }
}

</script>
<style>

</style>
