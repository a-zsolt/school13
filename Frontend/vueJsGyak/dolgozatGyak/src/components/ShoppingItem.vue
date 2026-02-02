<script>
export default {
  name: "ShoppingItem",
  props: { item: Object, required: true },
  emits: ["remove", "change-qty", "toggle-bought"],
  methods: {
    onRemove() {
      this.$emit("remove", this.item.id);
    },
    onInc() {
      this.$emit("change-qty", this.item.id, '+');
    },
    onDec() {
      this.$emit("change-qty", this.item.id, '-');
    },
    onToggle() {
      this.$emit("toggle-bought", this.item.id);
    }
  }
}
</script>

<template>
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-title">{{ item.name }}</h5>
        <div class="hstack gap-5">
          <div class="input-group input-group-sm" style="max-width: 100px;">
            <button type="button" class="btn btn-outline-secondary" @click="onDec"><i class="bi bi-dash"></i></button>
            <span type="text" class="form-control">{{ item.qty }}</span>
            <button type="button" class="btn btn-outline-secondary" @click="onInc"><i class="bi bi-plus"></i></button>
          </div>
          <div class="hstack gap-2">
            <button type="button" class="btn btn-outline-danger" @click="onRemove"><i class="bi bi-trash"></i></button>
            <button type="button" class="btn" :class="{'btn-primary': item.bought, 'btn-outline-primary': !item.bought}" @click="onToggle"><i class="bi"
                                                                                       :class="{'bi-bag-check-fill': item.bought, 'bi-bag-check': !item.bought}"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>