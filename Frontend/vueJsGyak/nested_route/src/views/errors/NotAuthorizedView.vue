<script>
export default {
  name: "NotAuthorizedView"
}
</script>

<template>
<section class="text-center py-5">
  <h1 class="display-5">403</h1>
  <p class="text-muted"> Nincs Jogosultságod ehhez az oldalhoz.</p>
  <div class="d-flex gap-2 justify-content-center">
    <RouterLink class="btn btn-primary" to="/app/overview">Back to App</RouterLink>
    <RouterLink class="btn btn-outline-secondary" to="/">Public</RouterLink>
  </div>
</section>
</template>

<style scoped>

</style>