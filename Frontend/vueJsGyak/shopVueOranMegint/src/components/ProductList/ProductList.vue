<script>
import ProductCard from "@/components/ProductList/ProductCard.vue";

export default {
  name: "ProductList",
  components: {ProductCard},
  props: {products: Array, required: true},
  emits: ['addToCart']
}
</script>

<template>
<section class="col-12 col-md-3">
  <div v-for="product in products" :key="product.id">
    <ProductCard :product="product" @addToCart="$emit('addToCart', product.id)"/>
  </div>
</section>
</template>

<style scoped>

</style>