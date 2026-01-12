<script>
export default {
  name: "CartItemRow",
  props: { item: Object },
  emits: ['dec', 'inc', 'remove'],
}
</script>

<template>
  <li class="list-group-item d-flex justify-content-between">
    <div>
      <div class="d-flex">
        <span class="me-1">{{ item.name }} x </span>
        <div class="input-group input-group-sm" style="max-width: 75px;">
          <button class="btn btn-outline-secondary" @click="$emit('dec')">-</button>
          <span class="form-control quantity-input">{{ item.qty }}</span>
          <button class="btn btn-outline-secondary" @click="$emit('inc')">+</button>
        </div>
      </div>
    </div>
    <div>
      <span class="text-primary me-2">€{{ item.price * item.qty }}</span>
      <button class="btn btn-outline-secondary btn-sm" @click="$emit('remove')">X</button>
    </div>
  </li>
</template>

<style scoped>

</style>