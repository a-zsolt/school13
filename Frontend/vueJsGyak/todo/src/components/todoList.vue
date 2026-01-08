<script>
import TodoItem from "@/components/todoItem.vue";
export default {
  name: "todoList",
  components: {TodoItem},
  props: ['tasks'],
  emits: ['deleteTask', 'toggleTask']
}
</script>

<template>
  <section class="col-sm-12 col-md-7 col-lg-7 gap-2 vstack">
    <TodoItem v-for="task in tasks" :key="task.id" :task="task"
              @deleteTask="$emit('deleteTask', task.id)"
              @toggleTask="$emit('toggleTask', task.id)"
    />
  </section>
</template>

<style scoped>

</style>