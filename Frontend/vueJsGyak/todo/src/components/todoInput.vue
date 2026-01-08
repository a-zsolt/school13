<script>
export default {
  name: "todoInput",
  data() {
    return {
      text: ""
    }
  },
  methods: {
    addItem() {
      this.$emit('addItem', this.text)
    }
  },
  emits: ['addItem']
}
</script>

<template>
<section class="col-sm-12 col-md-5 col-lg-5 mb-2 mb-md-0">
  <form @submit.prevent="addItem" class="input-group">
    <input type="text" class="form-control" v-model="text">
    <input type="submit" value="Hozzáadás" class="btn btn-primary">
  </form>
</section>
</template>

<style scoped>

</style>