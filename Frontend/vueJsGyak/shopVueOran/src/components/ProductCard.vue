<script>
export default {
  name: "ProductCard",
  props: {product: Object},
  emits: ['addItem']
}
</script>

<template>
  <div class="card h-100">
    <div class="card-body">
      <h5 class="card-title">{{ product.name }}</h5>
      <p class="card-text text-muted fs-4 fw-bold">€{{ product.price }}</p>
      <a href="#" class="btn btn-primary" @click="$emit('addItem')">Vásárlás</a>
    </div>
  </div>
</template>

<style scoped>

</style>