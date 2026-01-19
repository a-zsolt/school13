<script>
import ProductList from "@/components/ProductList/ProductList.vue";

export default {
  name: 'App',
  components: {ProductList},
  data() {
    return {
      products: [
        { "id": 1, "name": "Vezeték nélküli fülhallgató", "price": 19990 },
        { "id": 2, "name": "Okos nyomkövető kártya", "price": 12990 },
        { "id": 3, "name": "Hordozható power bank", "price": 15990 },
        { "id": 4, "name": "Autós telefontartó", "price": 4990 },
        { "id": 5, "name": "Bluetooth hangszóró", "price": 17990 },
        { "id": 6, "name": "USB-C gyorstöltő adapter", "price": 6990 },
        { "id": 7, "name": "Vezeték nélküli egér", "price": 3990 },
        { "id": 8, "name": "Laptop hátizsák", "price": 14990 },
        { "id": 9, "name": "Okos LED izzó", "price": 5990 },
        { "id": 10, "name": "Mechanikus billentyűzet", "price": 24990 }
      ],
      cart: []
    }
  },
  methods: {
    addToCart(productId) {
      const product = this.products.find(product => product.id === productId);
      if (product) this.cart.push(product);
    }
  }
}
</script>

<template>
  <main class="container">
    <div class="row">
      <ProductList :products="products" @addToCart="addToCart"/>

    </div>
  </main>
</template>

<style scoped>

</style>
