<script>
export default {
  name: "NotFoundView"
}
</script>

<template>
<section class="text-center py-5">
  <h1 class="display-6">404</h1>
  <p class="text-muted">Az oldal nem található</p>
  <div class="d-flex gap-2 justify-content-center">
    <RouterLink class="btn btn-primary" to="/">Home</RouterLink>
    <RouterLink class="btn btn-outline-secondary" to="/products">Products</RouterLink>
  </div>
</section>
</template>

<style scoped>

</style>