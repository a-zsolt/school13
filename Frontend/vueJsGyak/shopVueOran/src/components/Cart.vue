<script>
import CartItemRow from "@/components/CartItemRow.vue";

export default {
  name: "Cart",
  components: {CartItemRow},
  props: {cart: Array, required: true },
  emits: ['dec', 'inc', 'remove'],
  computed: {
    totalPrice() {
      let total = 0;
      for (let product of this.cart) {
        total += product.price * product.qty;
      }
      return total;
    }
  }
}
</script>

<template>
  <section class="col-12 col-md-4 col-sm-6 mt-4">
    <div v-if="cart.length === 0" class="alert alert-info" role="alert">Nincs termék a kosárban!</div>
    <div v-else>
      <ul class="list-group">
        <CartItemRow v-for="item in cart" :key="item.id" :item="item"
                     @dec="$emit('dec', item.id)"
                     @inc="$emit('inc', item.id)"
                     @remove="$emit('remove', item.id)"
        />
      </ul>
      <p class="border-top mt-2 fs-4 fw-bold">Subtotal: €{{ totalPrice }}</p>
    </div>
  </section>
</template>

<style scoped>

</style>