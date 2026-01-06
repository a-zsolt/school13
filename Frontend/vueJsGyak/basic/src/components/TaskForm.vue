<script>
export default {
  name: "TaskForm",
  emits: ["addTask"],
  data() {
    return {
      title: "",
      priority: "low"
    }
  },
  methods: {
    submit() {
      if(!this.title) return;
      this.$emit("addTask", this.title, this.priority);
    }
  }
}
</script>

<template>
<section class="form-row">
  <form @submit.prevent="submit">
    <input type="text" placeholder="Új feladat..." v-model="title">
    <select v-model="priority">
      <option value="low">Alacsony</option>
      <option value="medium">Közepes</option>
      <option value="high">Magas</option>
    </select>
    <input type="submit" value="Hozzáadás">
  </form>
</section>
</template>

<style scoped>

</style>