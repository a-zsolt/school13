<script>
import ProductList from "@/components/ProductList.vue";
import Cart from "@/components/Cart.vue";

export default {
  name: "App",
  components: {Cart, ProductList},
  data () {
    return {
      products: [
        {
          id: "1",
          name: "ClubSport Steering Wheel Formula V2.5 X",
          price: 369
        },
        {
          id: "2",
          name: "CSL Elite Steering Wheel Porsche Vision GT",
          price: 349
        },
        {
          id: "3",
          name: "ClubSport Steering Wheel F1® Esports V2",
          price: 239
        },
        {
          id: "4",
          name: "Podium Steering Wheel BMW M4 GT3",
          price: 1499
        }
      ],
      cart: [],
    }
  },
  methods: {
    addItem(product) {
      const existingProduct = this.cart.find(x => x.id === product.id)
      if (existingProduct) {
        existingProduct.qty += 1;
      } else {
        this.cart.push({
          id: product.id,
          name: product.name,
          price: product.price,
          qty: 1
        })
        console.log(this.cart)
      }
    },
    incItemQty(id) {
      const item = this.cart.find(x => x.id === id)
      item.qty += 1;
    },
    decItemQty(id) {
      const item = this.cart.find(x => x.id === id)
      if (item.qty > 1) {
        item.qty -= 1;
      } else {
        this.removeItem(id)
      }
    },
    removeItem(id) {
      this.cart = this.cart.filter(x => x.id !== id);
    }
  }
}
</script>

<template>
  <main class="container-fluid container-sm">
      <div class="row">
        <ProductList :products="products" @addItem="addItem"/>
        <Cart :cart="cart" @inc="incItemQty" @dec="decItemQty" @remove="removeItem"/>
      </div>
  </main>
</template>

<style scoped>

</style>
