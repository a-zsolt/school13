<script>
import {RouterLink} from "vue-router";

export default {
  name: "NotFoundView",
  components: { RouterLink }
}
</script>

<template>
  <section class="text-center py-5">
    <div class="display-1 fw-bold">404</div>
    <p class="text-secondary mb-4">Az oldal nem található</p>
    <router-link class="btn btn-primary" to="/">
      <i class="bi bi-house-door"></i> Kezdőlap
    </router-link>
  </section>
</template>

<style scoped>

</style>