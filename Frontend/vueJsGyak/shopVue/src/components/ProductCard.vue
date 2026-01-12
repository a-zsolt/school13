<script>
export default {
  name: "ProductCard",
  props: {product: Object},
  emits: ['addProduct'],
}
</script>

<template>
  <div class="card h-100">
    <div class="card-body">
      <h5 class="card-title">{{ product.name }}</h5>
      <div class="d-flex justify-content-between align-items-center">
        <p class="card-text badge text-bg-secondary fs-6">€{{ product.price }}</p>
        <button class="btn btn-sm btn-primary" @click="$emit('addProduct')">Vásárlás</button>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>