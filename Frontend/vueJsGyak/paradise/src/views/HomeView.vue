<script>
import {RouterLink} from "vue-router";
export default {
  name: "HomeView",
  components: {
    RouterLink
  }
}
</script>

<template>
<section class="p-4 p-md-5 bg-light rounded-3 border">
  <h1 class="mb-2">Mini Éttermi Asztalfoglaló</h1>
  <p class="text-muted mb-4">
    Válasz éttermet, foglalj időpontot és kezeld a foglalásaidat.
  </p>
  <div class="d-flex gap-2">
      <RouterLink :to="{name: 'restaurants'}" class="btn btn-primary">Éttermek</RouterLink>
      <RouterLink :to="{name: 'booking'}" class="btn btn-outline-secondary">Foglalásaim</RouterLink>
  </div>
</section>
</template>

<style scoped>

</style>