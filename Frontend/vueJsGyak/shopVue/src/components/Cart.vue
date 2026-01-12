<script>
import CartItemRow from "@/components/CartItemRow.vue";

export default {
  name: "Cart",
  components: {CartItemRow},
  props: {cart: Array},
  emits: ['dec', 'inc', 'remove'],
  computed: {
    cartPrice() {
      let price = 0;
      for (let item of this.cart) {
        price += item.price * item.qty;
      }
      return price;
    }
  }
}
</script>

<template>
  <section class="col-12 col-md-4">
    <h1>Cart</h1>
    <div v-if="Object.keys(cart).length > 0">
      <ul  class="list-group">
        <CartItemRow v-for="item in cart" :key="item.id" :item="item"
                     @inc="$emit('inc', item.id)"
                     @dec="$emit('dec', item.id)"
                     @remove="$emit('remove', item.id)"
        />
      </ul>
      <div class="mt-2 border-top">
        <h3 class="text-secondary fw-bold">€{{ cartPrice }}</h3>
      </div>
    </div>
    <div class="alert alert-info" v-else>No items in cart.</div>
  </section>
</template>

<style scoped>

</style>