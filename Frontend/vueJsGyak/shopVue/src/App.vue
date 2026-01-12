<script>
import ProductList from "@/components/ProductList.vue";
import Cart from "@/components/Cart.vue";


export default {
  name: 'App',
  components: {ProductList, Cart},
  data () {
    return {
      products: [
        {
          id: 1,
          name: 'MOZA KS Pro Steering Wheel',
          price: 349
        },
        {
          id: 2,
          name: 'MOZA FSR2 Formula Wheel',
          price: 699
        },
        {
          id: 3,
          name: 'MOZA Vision GS Wheel',
          price: 769
        },
        {
          id: 4,
          name: 'MOZA GS V2P GT Wheel',
          price: 399
        },
        {
          id: 5,
          name: 'MOZA KS Steering Wheel',
          price: 249
        }
      ],
      cart: []
    }
  },
  methods: {
    addProduct (product) {
      const existingProduct = this.cart.find(item => item.id === product.id)
      if (existingProduct) {
        existingProduct.qty = existingProduct.qty + 1;
      } else {
        this.cart.push({
          id: product.id,
          name: product.name,
          price: product.price,
          qty: 1
        });
      }
    },
    incProdQty (id) {
      const product = this.cart.find((item) => item.id === id);
      product.qty = product.qty + 1;
    },
    decProdQty (id) {
      const product = this.cart.find((item) => item.id === id);
      if (product.qty > 1) {
        product.qty = product.qty - 1;
      } else {
        this.removeProduct(id);
      }
    },
    removeProduct (id) {
      this.cart = this.cart.filter((item) => item.id !== id);
    }
  }
}
</script>

<template>
  <main class="container-fluid">
    <div class="row">
      <ProductList :products="products" @addProduct="addProduct" />
      <Cart :cart="cart"
            @inc="incProdQty" @dec="decProdQty" @remove="removeProduct"
      />
    </div>
  </main>
</template>

<style scoped>

</style>
