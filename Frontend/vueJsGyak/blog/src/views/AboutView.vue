<script>
import {RouterLink} from "vue-router";

export default {
  name: "AboutView",
  components: {
    RouterLink
  }
}
</script>

<template>
  <section class="m-4 card bg-light border-0 shadow-sm">
    <div class="card-body p-4">
      <h2 class="h4">
        <i class="bi bi-info-circle me-2"></i> Rólunk
      </h2>
      <p class="text-secondary mb-3">Ez egy demo projekt router gyakorláshoz</p>
      <router-link class="btn btn-outline-primary" :to="{name: 'home'}">
        <i class="bi bi-arrow-left"></i> Vissza a kezdőlapra
      </router-link>
    </div>
  </section>
</template>

<style scoped>
 .card {
   border-radius: 16px;
 }
</style>