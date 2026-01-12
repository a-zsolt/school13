<script>
import ProductCard from "@/components/ProductCard.vue";

export default {
  name: "ProductList",
  components: {ProductCard},
  props: { products: Array },
  emits: ['addProduct'],
}
</script>

<template>
  <section class="col-12 col-md-8 row row-cols-1 row-cols-md-3 p-4 g-3">
    <div class="col" v-for="product in products" :key="product.id">
      <ProductCard :product="product"
                   @addProduct="$emit('addProduct', product)"
      />
    </div>
  </section>
</template>

<style scoped>

</style>