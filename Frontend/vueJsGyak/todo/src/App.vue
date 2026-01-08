<script>
import TodoInput from "@/components/todoInput.vue";
import TodoList from "@/components/todoList.vue";

export default {
  name: 'app',
  components: {TodoList, TodoInput},
  data() {
    return {
      tasks: []
    }
  },
  methods: {
    saveTask(text) {
      this.tasks.unshift({
        id: crypto.randomUUID(),
        text: text,
        isDone: false,
        createdAt: Date.now()
      })
    }
  },

}
</script>

<template>
  <main class="container">
    <div class="row mt-2">
      <TodoInput @addItem="saveTask"/>
      <TodoList :tasks="tasks"/>
    </div>

  </main>
</template>

<style scoped>

</style>
