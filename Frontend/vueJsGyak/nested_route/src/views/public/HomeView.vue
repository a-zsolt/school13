<script>
export default {
  name: "HomeView"
}
</script>

<template>
<section class="p-4 bg-white border rounded-3">
<h1 class="h3">Home</h1>
  <p class="text-muted mb-3">
    Demo projekt: Vue Nested Router
  </p>
  <div class="d-flex gap-2 flex-wrap">
    <RouterLink class="btn btn-primary" to="/products">Products</RouterLink>
    <RouterLink class="btn btn-outline-primary" to="/blog">Blog</RouterLink>
    <RouterLink class="btn btn-warning" to="/app"> Go to App</RouterLink>
  </div>
  <hr>
  <h2 class="h5" id="anchors">Anchor demo</h2>
  <p class="text-muted">Próbáld: <RouterLink to="/#anchors">/#anchors</RouterLink> (hash scroll)</p>
</section>
</template>

<style scoped>

</style>