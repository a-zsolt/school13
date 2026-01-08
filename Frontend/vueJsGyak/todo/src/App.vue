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
        text,
        isDone: false,
        createdAt: Date.now()
      })
    },
    deleteTask(taskId) {
      this.tasks = this.tasks.filter((task) => task.id !== taskId);
    },
    toggleTask(taskId) {
      console.log(taskId);
      const task = this.tasks.find(task => task.id === taskId);
      if (task) task.isDone = !task.isDone;
    }
  },

}
</script>

<template>
  <main class="container">
    <div class="row mt-2">
      <TodoInput @addItem="saveTask"/>
      <TodoList :tasks="tasks" @deleteTask="deleteTask" @toggleTask="toggleTask"/>
    </div>

  </main>
</template>

<style scoped>

</style>
