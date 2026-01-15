<script>
import ProductCard from "@/components/ProductCard.vue";

export default {
  name: "ProductList",
  components: {ProductCard},
  props: {products: Array},
  emits: ['addItem']
}
</script>

<template>
  <section class="col-12 col-sm-6 col-md-8 row row-cols-1 g-3 row-cols-md-3">
    <div class="col" v-for="product in products" :key="product.id">
      <ProductCard :product="product"
                   @addItem="$emit('addItem', product)"
      />
    </div>
  </section>
</template>

<style scoped>

</style>