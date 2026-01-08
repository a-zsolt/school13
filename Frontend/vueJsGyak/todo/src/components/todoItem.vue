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
      <div class="row align-items-center">
        <div class="col-auto">
          <input type="checkbox" class="form-check-input" :checked="task.isDone" @click="$emit('toggleTask')">
        </div>
        <div class="col">
          <p class="card-text" :class="{done: task.isDone}">{{ task.text }}</p>
        </div>
        <div class="col-auto">
          <button class="btn btn-primary" @click="$emit('deleteTask')">Törés</button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.done{
  text-decoration: line-through;
}
</style>