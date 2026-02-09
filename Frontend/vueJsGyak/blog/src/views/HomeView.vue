<script>
import {RouterLink} from "vue-router";

export default {
  name: "HomeView",
  components: {RouterLink}
}
</script>

<template>
  <section class="card bg-light border-0 shadow-sm">
    <div class="card-body p-4">
      <h1 class="display-6 mb-2">
        <i class="bi bi-rocket-takeoff me-2"></i> Kezdőlap
      </h1>
      <p class="text-secondary mb-4">Egyszerű Vue Router gyakorlás Bootsrap + ikonok</p>
      <div class="hstack gap-2 flex-wrap">
        <router-link class="btn btn-primary" :to="{name: 'blog'}">
          <i class="bi bi-journal"></i> Blog
        </router-link>
        <router-link class="btn btn-outline-secondary" :to="{name: 'about'}">
          <i class="bi bi-info-circle"></i> Rólunk
        </router-link>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>