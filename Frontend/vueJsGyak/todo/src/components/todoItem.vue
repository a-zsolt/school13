<script>
export default {
  name: "todoItem",
  props: ["task"],
  emits: ['deleteTask', 'toggleTask']
}
</script>

<template>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-1 flex align-content-center">
          <input type="checkbox" class="form-check-input" :checked="task.isDone" @click="$emit('toggleTask')">
        </div>
        <div class="col-8">
          <p class="card-text">{{ task.text }}</p>
        </div>
        <div class="col-2 flex align-content-center">
          <button class="btn btn-primary" @click="$emit('deleteTask')">Törés</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>