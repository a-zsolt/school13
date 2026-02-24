<script>
export default {
  name: "RestaurantCard",
  props:{
    restaurant: {type: Object, required: true, default: null},
  },
  emits: ['select']
}
</script>

<template>
<div class="card h-100">
  <div class="card-body">
    <h5 class="card-title mb-1">{{restaurant.name}}</h5>
    <div class="text-muted mb-3">
    {{restaurant.cuisine}} - Értékelés: {{restaurant.rating}}
    </div>
    <div class="d-flex flex-wrap gap-2 mb-3">
      <span v-for="t in restaurant.timeslots" :key="t" class="badge bg-light text-dark border">{{t}}</span>
    </div>
    <button type="button" class="btn btn-success w-100" @click="$emit('select',restaurant.id)">Foglalás</button>
  </div>
</div>
</template>

<style scoped>

</style>