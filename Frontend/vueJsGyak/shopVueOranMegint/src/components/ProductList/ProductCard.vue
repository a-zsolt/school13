<script>
export default {
  name: "ProductCard",
  props: { product: Object, required: true },
  emits: ['addToCart']
}
</script>

<template>
  <div class="card">
    <div class="card-body">
      <p>{{ product.name }} - <span class="badge bg-warning">{{ product.price }}</span></p>
      <button class="btn btn-primary" @click="$emit('addToCart')">Kosárba</button>
    </div>
  </div>
</template>

<style scoped>

</style>